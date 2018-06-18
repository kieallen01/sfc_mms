<?php
	include ("../includes/connection.php");

	$strEditMaintenanceFee = $conn->prepare("
		UPDATE
			tbl_maintenancefee
		SET
			tbl_maintenancefee.fld_businesstype_id 	= '".$_POST["cmbEditMaintenanceFeeBusinessTypeID"]."',
			tbl_maintenancefee.fld_maintenancefee_fee 	= '".$_POST["nudEditMaintenanceFeeFee"]."'
		WHERE
			tbl_maintenancefee.fld_maintenancefee_id = '".$_POST["txthiddenEditMaintenanceFeeID"]."';
	");

	echo ($strEditMaintenanceFee->execute());
?>