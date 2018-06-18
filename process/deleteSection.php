<?php
	include ("../includes/connection.php");

	$strDeleteSection = $conn->prepare("
		DELETE FROM
			tbl_section
		WHERE
			tbl_section.fld_section_id = '".$_POST["sectionid"]."';
	");

	echo ($strDeleteSection->execute());
?>