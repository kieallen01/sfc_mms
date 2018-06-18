<?php
	require 'database.php';
	// $dbHost = "192.168.202.32";
	// $dbName = "db_market";
	// $dbUsername = "root";
	// $dbPassword = "";

	$conn = new PDO ($dbDriver.":host=".$dbHost.";dbname=".$dbName.";charset=".$dbCharset,$dbUsername,$dbPassword);
	date_default_timezone_set("Asia/Manila");
	$serverdir = "http://localhost/sfc_market";

?>