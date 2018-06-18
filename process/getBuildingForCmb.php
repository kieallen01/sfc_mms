<?php
	include('..//includes/connection.php');

	$strGetBuildingForCmb = "
		SELECT
			tbl_bldg.fld_bldg_id,
			tbl_bldg.fld_bldg_code,
			tbl_bldg.fld_bldg_name,

			tbl_market_facility.fld_market_facility_code
		FROM
			tbl_bldg
		INNER JOIN
			tbl_market_facility ON tbl_bldg.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		WHERE
			tbl_market_facility.fld_market_facility_id = '".$_POST['marketfacilityid']."'
	";

	$cmdGetBuildingForCmb = $conn->query($strGetBuildingForCmb);
	$arrayGetBuildingForCmb = [];

	while ($data=$cmdGetBuildingForCmb->fetch(PDO::FETCH_BOTH)) {
		$bldgid 			= $data[0];
		$bldgcode 			= $data[1];
		$bldgname 			= $data[2];
		$marketfacilitycode = $data[3];

		$rows = [
			'bldgid' 			 => $bldgid,
			'bldgcode'  		 => $bldgcode,
			'bldgname' 			 => $bldgname,
			'marketfacilitycode' => $marketfacilitycode
		];
		array_push($arrayGetBuildingForCmb, $rows);
	}
	echo json_encode($arrayGetBuildingForCmb);
?>