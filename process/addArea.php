<?php
	include ("../includes/connection.php");

	$strAddArea = $conn->prepare("
		INSERT INTO
			tbl_area
		VALUES (
			NULL,
			'".$_POST["txtAddAreaDesc"]."',
			'".$_POST["txtAddAreaSize"]."',
			'".$_POST["cmbAddAreaUnit"]."'
		);
	");

	echo ($strAddArea->execute());
?>