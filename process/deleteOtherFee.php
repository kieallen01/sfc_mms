<?php
	include ("../includes/connection.php");

	$strDeleteOtherFee = $conn->prepare("
		DELETE FROM
			tbl_otherfee
		WHERE
			tbl_otherfee.fld_otherfee_id = '".$_POST["otherfeeid"]."';
	");

	echo ($strDeleteOtherFee->execute());
?>