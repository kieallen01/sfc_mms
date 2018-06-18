<?php
	include("../includes/connection.php");

	$applicationid = $_POST["txthiddenApplicationId"];

	$strEditStatus = $conn->prepare("
		UPDATE
			tbl_stall_application
		SET
			fld_stall_application_status = '1'
		WHERE
			fld_stall_application_id = '".$applicationid."';

	");
	echo ($strEditStatus->execute());
?>