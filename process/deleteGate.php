<?php
	include ("../includes/connection.php");

	$strDeleteGate = $conn->prepare("
		DELETE FROM
			tbl_gate
		WHERE
			tbl_gate.fld_gate_id = '".$_POST["gateid"]."';
	");

	echo ($strDeleteGate->execute());
?>