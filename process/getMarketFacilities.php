<?php
	include ("../includes/connection.php");

	$strGetMarketFacilities = "
		SELECT
			tbl_market_facility.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name
		FROM
			tbl_market_facility
		ORDER BY
			tbl_market_facility.fld_market_facility_name;
	";
	$cmdGetMarketFacilities = $conn->query($strGetMarketFacilities);
	$arrayMarketFacilities = [];
	while ($data=$cmdGetMarketFacilities->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilityname = $data[1];

		$rows = [
			"marketfacilityid"=>$marketfacilityid,
			"marketfacilityname"=>$marketfacilityname
		];
		array_push($arrayMarketFacilities,$rows);
	}
	echo json_encode($arrayMarketFacilities);
?>