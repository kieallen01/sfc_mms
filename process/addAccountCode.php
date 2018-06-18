<?php
	include ("../includes/connection.php");

	$strAddAccountCode = $conn->prepare("
			INSERT INTO
				tbl_accountcode
			VALUES (
				'".$_POST["txtAddAccountCodeCode"]."',
				'".$_POST["txtAddAccountCodeDesc"]."'
			);
		");

	echo ($strAddAccountCode->execute());
?>