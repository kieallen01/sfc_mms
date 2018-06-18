<?php
	include ("../includes/connection.php");

	$strDeleteStall = $conn->prepare("
		DELETE FROM
			tbl_stall
		WHERE
			tbl_stall.fld_stall_number = '".$_POST["stallnumber"]."';
	");

	echo ($strDeleteStall->execute());
?>