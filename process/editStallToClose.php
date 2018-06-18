<?php
	include('../includes/connection.php');

	$strEditStallToClose = $conn->prepare("
		UPDATE
			tbl_stall
		SET
			tbl_stall.fld_stall_application_id = NULL
		WHERE
			tbl_stall.fld_stall_application_id = '".$_POST['txtHiddenApplicantId']."' 
		AND 
			tbl_stall.fld_stall_number = '".$_POST['txtStallClosureNumber']."'
	");

	echo ($strEditStallToClose->execute());
?>