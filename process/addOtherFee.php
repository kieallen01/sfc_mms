<?php
	include ("../includes/connection.php");

	$strAddOtherFee = $conn->prepare("
		INSERT INTO
			tbl_otherfee
		VALUES (
			NULL,
			'".$_POST["txtAddOtherFeeDesc"]."',
			'".$_POST["nudAddOtherFeeValue"]."'
		);
	");

	echo ($strAddOtherFee->execute());
?>