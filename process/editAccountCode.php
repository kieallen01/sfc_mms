<?php
	include ("../includes/connection.php");

	$strEditAccountCode = $conn->prepare("
		UPDATE
			tbl_accountcode
		SET
			tbl_accountcode.fld_accountcode_code = '".$_POST["txtEditAccountCodeCode"]."',
			tbl_accountcode.fld_accountcode_desc = '".$_POST["txtEditAccountCodeDesc"]."'
		WHERE 
			tbl_accountcode.fld_accountcode_code = '".$_POST["txthiddenEditAccountCodeCode"]."';
	");

	echo ($strEditAccountCode->execute());
?>