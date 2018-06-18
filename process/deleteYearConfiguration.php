<?php
	include ("../includes/connection.php");

	$strDeleteYearConfiguration = $conn->prepare("
		DELETE FROM
			tbl_yearconf
		WHERE
			tbl_yearconf.fld_yearconf_year = '".$_POST["yearconfyear"]."';
	");

	echo ($strDeleteYearConfiguration->execute());
?>