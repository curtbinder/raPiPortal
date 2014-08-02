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

require "status/db.php";
require "masterconfig.php";
//include "config.php"  // overrides master settings
// improve a way to update settings for the end user
require "common.php";


htmlOpen(PORTAL_NAME);

// Display banner
displayHeader(PORTAL_NAME);

// Create login form

// Currently, just list all the devices on the site and then a form to add a new device
// Test for database
$db = new raDB();
$db->checkPortalCreated();
$db->displayAllDevices();
$db->close();

echo "<br><br><hr>\n";
displayAddNewDeviceForm();

displayFooter(PORTAL_NAME, PORTAL_VERSION);
htmlClose();

?>
