<?php
	include ("../includes/connection.php");

	$strDeleteAF = $conn->prepare("
		DELETE FROM
			tbl_af
		WHERE
			tbl_af.fld_af_id = '".$_POST["AFid"]."';
	");

	echo $strDeleteAF->execute();
?>