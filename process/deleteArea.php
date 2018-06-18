<?php
	include ("../includes/connection.php");

	$strDeleteArea = $conn->prepare("
		DELETE FROM
			tbl_area
		WHERE
			tbl_area.fld_area_id = '".$_POST["areaid"]."';
	");

	echo ($strDeleteArea->execute());
?>