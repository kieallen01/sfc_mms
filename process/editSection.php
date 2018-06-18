<?php
	include ("../includes/connection.php");

	$strEditSection = $conn->prepare("
		UPDATE
			tbl_section 
		SET
			fld_section_name = '".$_POST["txtEditSectionName"]."' 
		WHERE
			fld_section_id = '".$_POST["txthiddenEditSectionID"]."';
	");
	
	echo ($strEditSection->execute());
?>