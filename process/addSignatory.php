<?php
	include ("../includes/connection.php");

	$strAddSignatory = $conn->prepare("
		INSERT INTO
			tbl_signatory
		VALUES (
			NULL,
			'".$_POST["txtAddSignatoryName"]."',
			'".$_POST["txtAddSignatoryPosition"]."'
		);
	");

	echo ($strAddSignatory->execute());
?>