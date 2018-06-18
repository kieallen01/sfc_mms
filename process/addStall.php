<?php
	include ("../includes/connection.php");

	$strAddStall = $conn->prepare("
		INSERT INTO
			tbl_stall
		VALUES (
			'".$_POST["cmbAddStallMarketFacilityID"]."',
			'".$_POST["cmbAddStallBldgID"]."',
			'".$_POST["cmbAddStallSectionID"]."',
			'".$_POST["txtAddStallStallNumber"]."',
			'".$_POST["cmbAddStallAreaID"]."',
			NULL
		);
	");

	echo ($strAddStall->execute());
?>