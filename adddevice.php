<?php

require_once('status/db.php');

$device = $_POST['device'];
$host = $_POST['host'];
$port = $_POST['port'];

if ( empty($device) || empty($host) ) {
	printGoBackPage("Missing device name or host");
	die;
}

if ( empty($port) ) {
	$port = "2000";
}

$db = new raDB();
$db->addDevice($device, $host, $port);
$db->close();

printGoBackPage("Added");

function printGoBackPage($msg) {
	echo "<html><body>$msg<br>";
	echo "<form><input type=\"button\" value=\"Return\" onClick=\"javascript:window.location.href=\"/ra\" \"></form>";
	echo "</body></html>";
}
?>
