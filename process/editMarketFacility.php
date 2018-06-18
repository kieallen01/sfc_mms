<?php
	include("../includes/connection.php");
	$strEditMarketFacility = $conn->prepare("
		UPDATE
			tbl_market_facility 
		SET
			fld_market_facility_name = '".$_POST["txtEditMarketFacilityName"]."' 
		WHERE
			fld_market_facility_id = '".$_POST["txthiddenEditMarketFacilityID"]."';
	");
	
	echo ($strEditMarketFacility->execute());
?>