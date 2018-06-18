<?php
	include ("../includes/connection.php");

	$strEditArea = $conn->prepare("
		UPDATE
			tbl_area
		SET
			fld_area_desc 		= '".$_POST["txtEditAreaDesc"]."',
			fld_area_size 		= '".$_POST["txtEditAreaSize"]."',
			fld_area_sizeunit 	= '".$_POST["cmbEditAreaUnit"]."'
		WHERE
			fld_area_id = '".$_POST["txthiddenEditAreaID"]."';
	");

	echo ($strEditArea->execute());
?>