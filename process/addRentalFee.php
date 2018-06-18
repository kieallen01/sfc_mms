<?php
	include ("../includes/connection.php");

	$strAddRentalFee = $conn->prepare("
		INSERT INTO
			tbl_rentalfee
		VALUES (
			'".$_POST["cmbAddRentalFeeAreaDesc"]."',
			'".$_POST["cmbAddRentalFeeType"]."',
			'".$_POST["nudAddRentalFeeFee"]."'
		);
	");

	echo ($strAddRentalFee->execute());
?>