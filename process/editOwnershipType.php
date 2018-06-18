<?php
	include ("../includes/connection.php");

	$strEditOwnershipType = $conn->prepare("
		UPDATE
			tbl_ownershiptype
		SET
			fld_ownershiptype_desc = '".$_POST["txtEditOwnershipTypeDesc"]."'
		WHERE
			fld_ownershiptype_id = '".$_POST["txthiddenEditOwnershipTypeID"]."';
	");

	echo ($strEditOwnershipType->execute());
?>