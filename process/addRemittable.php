<?php
	include ("../includes/connection.php");

	$remittablevalue = $_POST["txtAddRemittableValue"] == "NULL" ? NULL : $_POST["txtAddRemittableValue"];

	$strAddRemittable = $conn->prepare("
		INSERT INTO
			tbl_remittable
		VALUES (
			NULL,
			'".$_GET["type"]."',
			'".$_POST["txtAddRemittableDesc"]."',
			'".$remittablevalue."'
		);
	");

	echo ($strAddRemittable->execute());
?>