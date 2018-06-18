<?php
	include ("../includes/connection.php");

	$strDeleteMaintenanceFee = $conn->prepare("
			DELETE FROM
				tbl_maintenancefee
			WHERE
				tbl_maintenancefee.fld_maintenancefee_id = '".$_POST["maintenancefeeid"]."';
		");

	echo ($strDeleteMaintenanceFee->execute());

?>