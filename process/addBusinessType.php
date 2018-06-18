<?php
	include ("../includes/connection.php");

	$strAddBusinessType = ("
		INSERT INTO
			tbl_businesstype
		VALUES (
			NULL,
			'".$_POST["txtAddBusinessTypeDesc"]."'
		);
	");

	echo ($strAddBusinessType->execute());
?>