<?php
	include("../includes/connection.php");

	$strAddBldg = $conn->prepare("
		INSERT INTO
			tbl_bldg
		VALUES (
			NULL,
			'".$_POST["txtAddBldgName"]."',
			'".$_POST["cmbAddBldgMarketFacilityID"]."'
		)
	");

	echo ($strAddBldg->execute());
?>