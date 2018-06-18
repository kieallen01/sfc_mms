<?php
	include ("../includes/connection.php");

	$strEditBusinessClassification = $conn->prepare("
		UPDATE
			tbl_businessclassify
		SET
			tbl_businessclassify.fld_businessclassify_desc = '".$_POST["txtEditBusinessClassificationDesc"]."',
			tbl_businessclassify.fld_businessclassify_range_from = '".$_POST["txtEditBusinessClassificationInvestmentFrom"]."',
			tbl_businessclassify.fld_businessclassify_range_to = '".$_POST["txtEditBusinessClassificationInvestmentTo"]."'
		WHERE
			tbl_businessclassify.fld_businessclassify_id = '".$_POST["txthiddenEditBusinessClassificationID"]."';
	");
	
	echo ($strEditBusinessClassification->execute());
?>