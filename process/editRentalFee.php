<?php
	include ("../includes/connection.php");

	$strEditRentalFee = $conn->prepare("
		UPDATE
			tbl_rentalfee
		SET
			tbl_rentalfee.fld_area_id = '".$_POST["cmbEditRentalFeeAreaDesc"]."',
			tbl_rentalfee.fld_rentalfee_type = '".$_POST["cmbEditRentalFeeType"]."',
			tbl_rentalfee.fld_rentalfee_fee = '".$_POST["nudEditRentalFeeFee"]."'
		WHERE
			tbl_rentalfee.fld_area_id = '".$_POST["txthiddenEditRentalFeeAreaID"]."';
	");

	echo ($strEditRentalFee->execute());
?>