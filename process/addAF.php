<?php
	include ("../includes/connection.php");

	$strAddAF = $conn->prepare("
		INSERT INTO
			tbl_af
		VALUES (
			NULL,
			'".$_POST["txtAddAFDesc"]."'
		);
	");

	echo $strAddAF->execute();
?>