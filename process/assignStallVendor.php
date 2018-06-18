<?php
	include ("../includes/connection.php");

	$strAssignStallVendor = $conn->prepare("
		UPDATE
			tbl_stall_vendor
		SET
			tbl_stall_vendor.fld_stall_number = '".$_POST["cmbAssignStallVendorStallNumber"]."'
		WHERE
			tbl_stall_vendor.fld_stall_vendor_id = '".$_POST["txthiddenAssignStallVendorVendorID"]."';
	");

	echo ($strAssignStallVendor->execute());
?>