<?php
	include ("../includes/connection.php");

	$strGetBldgs = "
		SELECT
			tbl_bldg.fld_bldg_id,
			tbl_bldg.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,
			tbl_bldg.fld_bldg_name
		FROM tbl_bldg
		 	INNER JOIN tbl_market_facility ON tbl_bldg.fld_market_facility_id = tbl_market_facility.fld_market_facility_id;		
	";
	$cmdGetBldgs = $conn->query($strGetBldgs);
	$arrayGetBldgs = [];
	while($data=$cmdGetBldgs->fetch(PDO::FETCH_BOTH)) {
		$bldgid = $data[0];
		$marketfacilityid = $data[1];
		$marketfacilityname = $data[2];
		$bldgname = $data[3];

		$rows = [
			"bldgid"				=>	$bldgid,
			"marketfacilityid"		=>	$marketfacilityid,
			"marketfacilityname"	=>	$marketfacilityname,
			"bldgname"				=>	$bldgname,
		];
		array_push($arrayGetBldgs,$rows);
	}
	echo json_encode($arrayGetBldgs);
?>