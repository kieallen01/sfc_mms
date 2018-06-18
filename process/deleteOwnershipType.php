<?php
	include ("../includes/connection.php");

	$strDeleteOwnershipType = $conn->prepare("
		DELETE FROM
			tbl_ownershiptype
		WHERE
			tbl_ownershiptype.fld_ownershiptype_id = '".$_POST["OTid"]."';
	");

	echo ($strDeleteOwnershipType->execute());
?>