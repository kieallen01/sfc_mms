<?php
	include('../includes/connection.php');

	$strGetMarketForCmb = "
		SELECT
			tbl_market_facility.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name
		FROM
			tbl_market_facility
	";

	$cmdGetMarketForCmb = $conn->query($strGetMarketForCmb);
	$arrayGetMarketForCmb = [];

	while ($data=$cmdGetMarketForCmb->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilityname = $data[1];

		$rows = [
			'marketfacilityid' 	 => $marketfacilityid,
			'marketfacilityname' => $marketfacilityname
		];
		array_push($arrayGetMarketForCmb, $rows);
	}
	echo json_encode($arrayGetMarketForCmb);
?>