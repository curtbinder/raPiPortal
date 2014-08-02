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
Content-type: text/html

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
    echo "<table><tr>";
    //echo "<td><img src='' alt='curtbinder logo'/></td>";
    echo "<td valign=center><span class='textbg'>$text</span></td>";
    echo "</tr></table>";
}

function displayFooter($title, $version) {
    echo "<br>";
    echo "<table><tr align='center'>";
    echo "<td><span class='copyright'>$title - Version $version</span></td>";
    echo "</tr></table>";
}

?>
