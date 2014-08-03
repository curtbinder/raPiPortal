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

require_once('db.php');

$id = $_GET["id"];
//$key = $_GET["key"];
$key = "";

if ( empty($id) ) {
	echo "Must provide a device ID\n";
	die;
}

// open database connection
$db = new raDB();

if ( ! $db->isValidDevice($id, $key) ) {
	// invalid device, print out failure
	echo "Invalid device";
	die;
}

/*
We need to query the database for the values. Then we need to associate the values with
the fields and construct the XML tags to be sent.
*/
$response = "<RA>\n";
$result = $db->getLatestParams($id);
$cols = $result->numColumns();
$row = $result->fetchArray();
// loop through all the columns and get all the data
for ( $i = 0; $i < $cols; $i++ ) {
	if ( empty($row[$i]) ) {
		continue;
	}
	$tag = $result->columnName($i);
	if ( strcmp($tag, "autoid") == 0 ) {
		continue;
	}
	$value = "<" . $tag . ">" . $row[$i] . "</" . $tag . ">";
	$response .= $value . "\n";
}
// add the closing xml tag
$response .= "</RA>";
echo $response;

?>
