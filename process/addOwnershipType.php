<?php
	include ("../includes/connection.php");

	$strAddOwnershipType = $conn->prepare("
		INSERT INTO
			tbl_ownershiptype
		VALUES (
			NULL,
			'".ucwords($_POST["txtAddOwnershipTypeDesc"])."'
		);
	");

	echo ($strAddOwnershipType->execute());
?>