<?php
	include ("../includes/connection.php");

	$strTimestamp = date("mdY-Hi");
	$dbBackupFilenameDefault = $dbName."-backup_".$strTimestamp;
	$dbBackupFileName = "";

	if (($_POST["txtBackupDBFileName"] === null) || ($_POST["txtBackupDBFileName"] == '')) {
		$dbBackupFileName = $dbBackupFilenameDefault;
	}
	else {
		$dbBackupFileName = $_POST["txtBackupDBFileName"];
	}

	$strBackupDB = ("mysqldump ".$dbName." -u ".$dbUsername." > ".$_POST["txtBackupDBFileDir"]."/".$dbBackupFileName.".sql");
	// $strBackupDB = ("mysqldump ".$dbName." -u ".$dbUsername." > C:/Users/IT-USER3/Desktop/sql_backup/" . $dbBackupFilenameDefault.".sql");

	$strBackupResult = exec($strBackupDB,$output,$return_var);
	if (($output === null)) {
		echo false;
	}
	else {
		echo true;
	}
?>