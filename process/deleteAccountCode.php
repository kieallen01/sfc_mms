<?php
	include ("../includes/connection.php");

	$strDeleteAccountCode = $conn->prepare("
		DELETE FROM
			tbl_accountcode
		WHERE
			tbl_accountcode.fld_accountcode_code = '".$_POST["accountcodecode"]."';
	");

	echo ($strDeleteAccountCode->execute());
?>