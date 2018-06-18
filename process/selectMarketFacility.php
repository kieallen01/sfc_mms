<?php
	include ("../includes/connection.php");
	
	$strSelectMarketFacility = "
		SELECT
			tbl_market_facility.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name
		FROM
			tbl_market_facility
		WHERE
			fld_market_facility_id = '".$_POST["marketfacilityid"]."';
	";
	$cmdSelectMarketFacility = $conn->query($strSelectMarketFacility);
	$arraySelectMarketFacility = [];
	while ($data=$cmdSelectMarketFacility->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilityname = $data[1];
		$row = [
			"marketfacilityid"=>$marketfacilityid,
			"marketfacilityname"=>$marketfacilityname
		];
		array_push($arraySelectMarketFacility,$row);
	}
	echo json_encode($arraySelectMarketFacility);
?>