<?php
	include ("../includes/connection.php");

	$servicedesc 	= !empty($_POST['txtAddServiceDescription']) 	? $_POST['txtAddServiceDescription']	: NULL;
	$servicevalue 	= !empty($_POST['nudAddServiceValue']) 			? $_POST['nudAddServiceValue']			: NULL;

	$strAddService = $conn->prepare("
		INSERT INTO
			tbl_service
		VALUES (
			NULL,
			'".$_POST["cmbAddServiceType"]."',
			'".$_POST["cmbAddServiceFeeType"]."',
			'".$servicedesc."',
			'".$servicevalue."'
		);
	");

	echo ($strAddService->execute());
?>