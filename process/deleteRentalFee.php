<?php
	include ("../includes/connection.php");

	$strDeleteRentalFee = $conn->prepare("
		DELETE FROM
			tbl_rentalfee
		WHERE
			tbl_rentalfee.fld_area_id = '".$_POST["areaid"]."';
	");

	echo ($strDeleteRentalFee->execute());
?>