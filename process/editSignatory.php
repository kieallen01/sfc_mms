<?php
	include ("../includes/connection.php");

	$strEditSignatory = $conn->prepare("
		UPDATE
			tbl_signatory
		SET
			fld_signatory_name = '".$_POST["txtEditSignatoryName"]."',
			fld_signatory_position = '".$_POST["txtEditSignatoryPosition"]."'
		WHERE
			fld_signatory_id = '".$_POST["txthiddenEditSignatoryID"]."';
	");

	echo ($strEditSignatory->execute());
?>