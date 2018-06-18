<?php
	include ("../includes/connection.php");

	$strEditAF = $conn->prepare("
		UPDATE
			tbl_af
		SET
			tbl_af.fld_af_desc = '".$_POST["txtEditAFDesc"]."'
		WHERE
			tbl_af.fld_af_id = '".$_POST["txthiddenEditAFID"]."';
	");

	echo $strEditAF->execute();
?>