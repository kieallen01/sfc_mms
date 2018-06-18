<?php
	include ("../includes/connection.php");

	$strEditGate = $conn->prepare("
		UPDATE
			tbl_gate
		SET
			fld_gate_name = '".$_POST["txtEditGateName"]."'
		WHERE
			fld_gate_id = '".$_POST["txthiddenEditGateID"]."';
	");

	echo ($strEditGate->execute());
?>