<?php
	include ("../includes/connection.php");

	$strDeleteBusinessClassification = $conn->prepare("
		DELETE FROM
			tbl_businessclassify
		WHERE
			tbl_businessclassify.fld_businessclassify_id = '".$_POST["BCid"]."';
	");

	echo ($strDeleteBusinessClassification->execute());
?>