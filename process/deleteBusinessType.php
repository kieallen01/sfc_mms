<?php
	include ("../includes/connection.php");

	$strDeleteBusinessType = $conn->prepare("
		DELETE FROM
			tbl_businesstype
		WHERE
			tbl_businesstype.fld_businesstype_id = '".$_POST["BTid"]."';
	");

	echo ($strDeleteBusinessType->execute());
?>