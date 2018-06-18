<?php
	include ("../includes/connection.php");

	$strDeleteMarketFacility = $conn->prepare("
		DELETE FROM
			tbl_market_facility
		WHERE
			tbl_market_facility.fld_market_facility_id = '".$_POST["marketfacilityid"]."';
	");

	echo ($strDeleteMarketFacility->execute());
?>