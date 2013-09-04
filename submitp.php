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

include "db.php";

$id = $_GET["id"];
$key = $_GET["key"];

// open database connection
$db = new raDB();

if ( ! isValidDevice($id, $key) ) {
	// invalid device, print out failure
	die;
}

// close when we finish working with the database
$db->close();

function isValidDevice($id, $key) {
	// must have an open database connection prior to calling
	global $db;
	$st = $db->prepare('select id, key from devices where id = :id');
	$st->bindValue(':id', $id);
	$result = $st->execute();
	if ( $result->numColumns() > 0 ) {
		// we have a device, compare keys
		if ( empty($key) ) {
			return true;
		} else {
			$row = $result->fetchArray();
			if ( strcmp($key, $row[1]) == 0 ) {
				return true;
			} else {
				return false;
			}
		}
	}
	return false;
}

?>