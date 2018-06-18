<?php
	include ("../includes/connection.php");

	$strAddBusinessClassification = $conn->prepare("
		INSERT INTO
			tbl_businessclassify
		VALUES (
			NULL,
			'".$_POST["txtAddBusinessClassificationDesc"]."',
			'".$_POST["txtAddBusinessClassificationInvestmentFrom"]."',
			'".$_POST["txtAddBusinessClassificationInvestmentTo"]."'
		);
	");

	echo ($strAddBusinessClassification->execute());
?>