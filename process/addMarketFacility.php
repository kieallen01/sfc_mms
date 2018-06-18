<?php
	include ("../includes/connection.php");

	$strAddMarketFacility = $conn->prepare("
		INSERT INTO 
			tbl_market_facility
		VALUES (
			NULL,
			'".$_POST["txtAddMarketFacilityName"]."'
		);
	");

	echo ($strAddMarketFacility->execute());
?>