<?php
	include ("../includes/connection.php");

	$strDeleteBldg = $conn->prepare("
		DELETE FROM
			tbl_bldg
		WHERE
			tbl_bldg.fld_bldg_id = '".$_POST["bldgid"]."';
	");

	echo ($strDeleteBldg->execute());
?>