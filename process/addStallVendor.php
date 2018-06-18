<?php
	include ("../includes/connection.php");

	// $strAddStallVendor = $conn->prepare("
	// 	INSERT INTO
	// 		tbl_stall_vendor
	// 	VALUES (
	// 		NULL,
	// 		'".$_POST["txtAddVendorFName"]."',
	// 		'".$_POST["txtAddVendorMName"]."',				
	// 		'".$_POST["txtAddVendorLName"]."',
	// 		'".$_POST["txtAddVendorTIN"]."',
	// 		'".$_POST["dpAddVendorBirthdate"]."',
	// 		'".$_POST["cmbAddVendorResidentialProvince"]."',
	// 		'".$_POST["cmbAddVendorResidentialCityMun"]."',
	// 		'".$_POST["cmbAddVendorResidentialBrgy"]."',
	// 		'".$_POST["cmbAddVendorSex"]."',
	// 		'".$_POST["nudAddVendorHeight"]."',
	// 		'".$_POST["nudAddVendorWeight"]."',
	// 		'".$_POST["cmbAddVendorBloodType"]."',
	// 		'".$_POST["txtAddVendorMobileNumber"]."',
	// 		'".$_POST["txtAddVendorTelNo"]."',				
	// 		'".$_POST["txtAddVendorEmailAddress"]."',				
	// 		'".$_POST["cmbAddVendorLegalStatus"]."',
	// 		'".$_POST["txtAddVendorSpouseFName"]."',				
	// 		'".$_POST["txtAddVendorSpouseMName"]."',				
	// 		'".$_POST["txtAddVendorSpouseLName"]."'				
	// 	);
	// ");

	$vendorMname = !empty($_POST["txtAddVendorMName"]) 			? $_POST["txtAddVendorMName"] 			: NULL;
	$vendorTelNo = !empty($_POST["txtAddVendorTelNo"]) 			? $_POST["txtAddVendorTelNo"] 			: NULL;
	$vendorEmail = !empty($_POST["txtAddVendorEmailAddress"]) 	? $_POST["txtAddVendorEmailAddress"] 	: NULL;
	$vendorSFname = !empty($_POST["txtAddVendorSpouseFName"]) 	? $_POST["txtAddVendorSpouseFName"] 	: NULL;
	$vendorSMname = !empty($_POST["txtAddVendorSpouseMName"]) 	? $_POST["txtAddVendorSpouseMName"] 	: NULL;
	$vendorSLname = !empty($_POST["txtAddVendorSpouseLName"]) 	? $_POST["txtAddVendorSpouseLName"] 	: NULL;

	$strAddStallVendor = $conn->prepare("
		INSERT INTO
			tbl_stall_vendor
		VALUES (
			NULL,
			'".$_POST["txtAddVendorFName"]."',
			'".$vendorMname."',				
			'".$_POST["txtAddVendorLName"]."',
			'".$_POST["txtAddVendorTIN"]."',
			'".$_POST["dpAddVendorBirthdate"]."',
			'".$_POST["cmbAddVendorResidentialProvince"]."',
			'".$_POST["cmbAddVendorResidentialCityMun"]."',
			'".$_POST["cmbAddVendorResidentialBrgy"]."',
			'".$_POST["cmbAddVendorSex"]."',
			'".$_POST["nudAddVendorHeight"]."',
			'".$_POST["nudAddVendorWeight"]."',
			'".$_POST["cmbAddVendorBloodType"]."',
			'".$_POST["txtAddVendorMobileNumber"]."',
			'".$vendorTelNo."',				
			'".$vendorEmail."',				
			'".$_POST["cmbAddVendorLegalStatus"]."',
			'".$vendorSFname."',				
			'".$vendorSMname."',				
			'".$vendorSLname."',
			NULL			
		);
	");

	// $strAddStallVendor = $conn->prepare("
	// 	INSERT INTO
	// 		tbl_stall_vendor
	// 	VALUES (
	// 		NULL,
	// 		'".!empty($_POST["txtAddVendorFName"]) 					?	$_POST["txtAddVendorFName"] 				: NULL."',
	// 		'".!empty($_POST["txtAddVendorMName"]) 					?	$_POST["txtAddVendorMName"] 				: NULL."',
	// 		'".!empty($_POST["txtAddVendorLName"]) 					?	$_POST["txtAddVendorLName"] 				: NULL."',
	// 		'".!empty($_POST["txtAddVendorTIN"]) 					?	$_POST["txtAddVendorTIN"] 					: NULL."',
	// 		'".!empty($_POST["dpAddVendorBirthdate"]) 				?	$_POST["dpAddVendorBirthdate"] 				: NULL."',
	// 		'".!empty($_POST["cmbAddVendorResidentialProvince"]) 	?	$_POST["cmbAddVendorResidentialProvince"] 	: NULL."',
	// 		'".!empty($_POST["cmbAddVendorResidentialCityMun"])		?	$_POST["cmbAddVendorResidentialCityMun"] 	: NULL."',
	// 		'".!empty($_POST["cmbAddVendorResidentialBrgy"]) 		?	$_POST["cmbAddVendorResidentialBrgy"] 		: NULL."',
	// 		'".!empty($_POST["cmbAddVendorSex"]) 					?	$_POST["cmbAddVendorSex"] 					: NULL."',
	// 		'".!empty($_POST["nudAddVendorHeight"])					?	$_POST["nudAddVendorHeight"] 				: NULL."',
	// 		'".!empty($_POST["nudAddVendorWeight"]) 				?	$_POST["nudAddVendorWeight"] 				: NULL."',
	// 		'".!empty($_POST["cmbAddVendorBloodType"]) 				?	$_POST["cmbAddVendorBloodType"] 			: NULL."',
	// 		'".!empty($_POST["txtAddVendorMobileNumber"]) 			?	$_POST["txtAddVendorMobileNumber"] 			: NULL."',
	// 		'".!empty($_POST["txtAddVendorTelNo"]) 					?	$_POST["txtAddVendorTelNo"] 				: NULL."',
	// 		'".!empty($_POST["txtAddVendorEmailAddress"]) 			?	$_POST["txtAddVendorEmailAddress"] 			: NULL."',
	// 		'".!empty($_POST["cmbAddVendorLegalStatus"]) 			?	$_POST["cmbAddVendorLegalStatus"] 			: NULL."',
	// 		'".!empty($_POST["txtAddVendorSpouseFName"]) 			?	$_POST["txtAddVendorSpouseFName"] 			: NULL."',
	// 		'".!empty($_POST["txtAddVendorSpouseMName"]) 			?	$_POST["txtAddVendorSpouseMName"] 			: NULL."',
	// 		'".!empty($_POST["txtAddVendorSpouseLName"]) 			?	$_POST["txtAddVendorSpouseLName"] 			: NULL."'
	// 	);
	// ");

	if ($strAddStallVendor->execute()) {
		echo true;
	}else{
		echo false;
	}
?>