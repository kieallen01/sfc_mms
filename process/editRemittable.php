<?php
	include ("../includes/connection.php");

	$strEditRemittable = $conn->prepare("
		UPDATE
			tbl_remittable
		SET
			tbl_remittable.fld_remittable_desc = '".$_POST["txtEditRemittableDesc"]."',
			tbl_remittable.fld_remittable_value = '".$_POST["txtEditRemittableValue"]."'
		WHERE
			tbl_remittable.fld_remittable_id = '".$_POST["txthiddenEditRemittableID"]."';
	");

	echo ($strEditRemittable->execute());
?>