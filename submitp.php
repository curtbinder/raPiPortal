<?php
/*
 * Copyright 2013 Curt Binder
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
Verify that the device exists before we can add any data to the table.
To verify, we need to retrieve the field 'id' from the GET string then
look it up in the devices table. If we get a result, then we have a device
and can proceed with the insert. If there is a key that is passed in, we need
to verify that the field 'key' matches what is stored in the database before
we can update.
*/

require_once('db.php');

$id = $_GET["id"];
//$key = $_GET["key"];
$key = "";

// open database connection
$db = new raDB();

if ( ! $db->isValidDevice($id, $key) ) {
	// invalid device, print out failure
	print "Invalid device";
	die;
}

/*
loop through the columns array
if the column exists in the GET array,
	then add the column and key to the insert statement
	otherwise skip the column

isset($var) - returns true if the value exists and false otherwise, NULL returns false
all incoming key/value pairs will be set, there will not be any NULL values
if the values are NULL, then we won't be storing them anyways
*/
$cols = $db->getParamsColumns();
$colstring = "id";
$valstring = "'" . SQLite3::escapeString($id) . "'";
$count = 0;
foreach ($cols as $x) {
	if ( isset($_GET[$x]) ) {
		$colstring .= ", " . $x;
		$valstring .= ", '" . SQLite3::escapeString($_GET[$x]) . "'";
		$count++;
	}
	// else skipped
}

// only insert if we actually have parameters sent to use
if ( $count == 0 ) {
	// no parameters
	// print out error response
	print "No parameters sent";
	die;
}
$colstring .= ", logdate";
$valstring .= ", datetime('now')";
$db->insertParameters($colstring, $valstring);

// update the database with the most recent IP address
// remote clients IP address is stored in $_SERVER['REMOTE_ADDR']
$db->updateDeviceLastIP(SQLite3::escapeString($id) , $_SERVER['REMOTE_ADDR']);

// close when we finish working with the database
$db->close();

// send response string
print "Success";
?>
