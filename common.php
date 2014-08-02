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

function htmlOpen($title) {
	print <<<EOF
<html>
<head><title>$title</title></head>
<link rel="stylesheet" href="/style.css" type="text/css">
<body>
EOF;
}

function htmlClose() {
	print <<<EOF
</body>
</html>
EOF;
}

function displayHeader($text) {
    echo "\n<table><tr>\n";
    //echo "<td><img src='' alt='curtbinder logo'/></td>";
    echo "<td valign=center><span class='textbg'>$text</span></td>\n";
    echo "</tr></table>\n";
}

function displayFooter($title, $version) {
    echo "<br>\n";
    echo "<table><tr align='center'>\n";
    echo "<td><span class='copyright'>$title - Version $version</span></td>\n";
    echo "</tr></table>\n";
}

function displayAddNewDeviceForm() {
	print <<<EOF
<form action='adddevice.php' method='post'>
<table>
	<thead><tr><th colspan=2>Add New Device</th></tr></thead>
	<tr><td align='left'>Device Name</td><td><input type='text' name='device'></td></tr>
	<tr><td align='left'>Host / IP</td><td><input type='text' name='host'></td></tr>
	<tr><td align='left'>Port (default 2000)</td><td><input type='text' name='port'></td></tr>
	<tr><td align='right' colspan=2><input type='submit' value='Add'></td></tr>
</table>
</form>
EOF;
}

?>
