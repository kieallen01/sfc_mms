<?php
	include ("../includes/connection.php");

	$strAddGoodsCommodities = $conn->prepare("
		INSERT INTO
			tbl_goodscommodities
		VALUES (
			NULL,
			'".$_POST["txtAddGoodsCommoditiesDesc"]."',
			'".$_POST["cmbAddGoodsCommoditiesBusinessTypeID"]."'
		);
	");

	echo ($strAddGoodsCommodities->execute());
?>