<?php
	include ("../includes/connection.php");

	$strDeleteRemittable = $conn->prepare("
		DELETE FROM
			tbl_remittable
		WHERE
			tbl_remittable.fld_remittable_id = '".$_POST["remittableid"]."';
	");

	echo ($strDeleteRemittable->execute());
?>