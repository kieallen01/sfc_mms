<?php
	include ("../includes/connection.php");

	$strDeleteSignatory = $conn->prepare("
		DELETE FROM
			tbl_signatory
		WHERE
			tbl_signatory.fld_signatory_id = '".$_POST["signatoryid"]."';
	");

	echo ($strDeleteSignatory->execute());
?>