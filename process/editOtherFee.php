<?php
	include ("../includes/connection.php");

	$strEditOtherFee = $conn->prepare("
		UPDATE
			tbl_otherfee
		SET
			tbl_otherfee.fld_otherfee_desc = '".$_POST["txtEditOtherFeeDesc"]."',
			tbl_otherfee.fld_otherfee_value = '".$_POST["nudEditOtherFeeValue"]."'
		WHERE
			tbl_otherfee.fld_otherfee_id = '".$_POST["txthiddenEditOtherFeeID"]."';
	");

	echo ($strEditOtherFee->execute());
?>