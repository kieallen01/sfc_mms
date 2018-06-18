<?php
	session_start();
	include ("../includes/connection.php");

	$strSetYearConfsToInactive = $conn->prepare("UPDATE tbl_yearconf SET tbl_yearconf.fld_yearconf_status = 'Inactive';");
	$strAddYearConf = $conn->prepare("INSERT INTO tbl_yearconf VALUES ('".$_POST["txtAddYearConfigurationYear"]."','Active');");

	if ($strSetYearConfsToInactive->execute()) {
		$_SESSION["yearconf"] = $_POST["txtAddYearConfigurationYear"];
		echo ($strAddYearConf->execute());
	}
	else {
		echo false;
	}
?>