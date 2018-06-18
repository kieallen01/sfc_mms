<?php
	include ("../includes/connection.php");

	$strEditBusinessType = $conn->prepare("
		UPDATE
			tbl_businesstype
		SET
			fld_businesstype_desc = '".$_POST["txtEditBusinessTypeDesc"]."'
		WHERE
			fld_businesstype_id = '".$_POST["txthiddenEditBusinessTypeID"]."';
	");

	echo ($strEditBusinessType->execute());
?>