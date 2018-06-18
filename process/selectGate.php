<?php
	include ("../includes/connection.php");

	$strSelectGate = "
		SELECT
			tbl_gate.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,
			tbl_gate.fld_bldg_id,
			tbl_bldg.fld_bldg_name,
			tbl_gate.fld_section_id,
			tbl_section.fld_section_name,
			tbl_gate.fld_gate_id,
			tbl_gate.fld_gate_name
		FROM tbl_gate 
			INNER JOIN tbl_market_facility ON tbl_gate.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
			INNER JOIN tbl_bldg ON tbl_gate.fld_bldg_id = tbl_bldg.fld_bldg_id
			INNER JOIN tbl_section ON tbl_gate.fld_section_id = tbl_section.fld_section_id
		WHERE
			tbl_gate.fld_gate_id = '".$_POST["gateid"]."';
	";
	$cmdSelectGate = $conn->query($strSelectGate);
	$arraySelectGate = [];

	while ($data=$cmdSelectGate->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilityname = $data[1];
		$bldgid = $data[2];
		$bldgname = $data[3];
		$sectionid = $data[4];
		$sectionname = $data[5];
		$gateid = $data[6];
		$gatename = $data[7];
		$rows = [
			"marketfacilityid"=>$marketfacilityid,
			"marketfacilityname"=>$marketfacilityname,
			"bldgid"=>$bldgid,
			"bldgname"=>$bldgname,
			"sectionid"=>$sectionid,
			"sectionname"=>$sectionname,
			"gateid"=>$gateid,
			"gatename"=>$gatename,
		];
		array_push($arraySelectGate,$rows);
	}
	echo json_encode($arraySelectGate);
?>