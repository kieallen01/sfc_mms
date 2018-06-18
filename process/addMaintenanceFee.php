<?php
	include ('../includes/connection.php');

	$strAddMaintenanceFee = $conn->prepare("
		INSERT INTO
			tbl_maintenancefee
		VALUES (
			NULL,
			'".$_POST["nudAddMaintenanceFeeFee"]."',
			'".$_POST["cmbAddMaintenanceFeeBusinessTypeID"]."'
		);
	");

	echo ($strAddMaintenanceFee->execute());
?>