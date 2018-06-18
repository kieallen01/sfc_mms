<?php
	include('../includes/connection.php');

	$strEditReassignStallOwner = $conn->prepare("
		UPDATE
			tbl_stall
		SET
			tbl_stall.fld_stall_application_id = '".$_POST['txtNewOwnerIdToReassign']."'
		WHERE	
			tbl_stall.fld_stall_number = '".$_POST['txtHiddenStallNumberToReassign']."'
	");
	echo ($strEditReassignStallOwner->execute());
?>