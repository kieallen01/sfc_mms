<?php
	include ("../includes/connection.php");

	$strGetStallForCmb = "
		SELECT
			tbl_stall.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_code,
			tbl_market_facility.fld_market_facility_name,

		 	tbl_stall.fld_bldg_id,
			tbl_bldg.fld_bldg_code,
		 	tbl_bldg.fld_bldg_name,

			tbl_stall.fld_section_id,
			tbl_section.fld_section_code,
			tbl_section.fld_section_name,

			tbl_stall.fld_area_id,
			tbl_area.fld_area_desc,
			tbl_area.fld_area_size,
			tbl_area.fld_area_sizeunit,

			tbl_stall.fld_stall_number
		FROM tbl_stall 
			INNER JOIN tbl_market_facility
				ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		 	INNER JOIN tbl_bldg
				ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
			INNER JOIN tbl_section
				ON tbl_stall.fld_section_id = tbl_section.fld_section_id
			INNER JOIN tbl_area
				ON tbl_stall.fld_area_id = tbl_area.fld_area_id
		WHERE
			tbl_stall.fld_section_id = '".$_POST["sectionid"]."';
	";
	$cmdGetSTallForCmb = $conn->query($strGetStallForCmb);
	while ($data=$cmdGetStalls->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilitycode = $data[1];
		$marketfacilityname = $data[2];
		$bldgid = $data[3];
		$bldgcode = $data[4];
		$bldgname = $data[5];
		$sectionid = $data[6];
		$sectioncode = $data[7];
		$sectionname = $data[8];
		$areaid = $data[9];
		$areadesc = $data[10];
		$areasize = $data[11];
		$areasizeuint = $data[12];
		$stallnumber = $data[13];
		$rows = [
			"marketfacilityid"		=>	$marketfacilityid,
			"marketfacilitycode"	=>	$marketfacilitycode,
			"marketfacilityname"	=>	$marketfacilityname,
			"bldgid"				=>	$bldgid,
			"bldgcode"				=>	$bldgcode,
			"bldgname"				=>	$bldgname,
			"sectionid"				=>	$sectionid,
			"sectioncode"			=>	$sectioncode,
			"sectionname"			=>	$sectionname,
			"areaid"				=>	$areaid,
			"areadesc"				=>	$areadesc,
			"areasize"				=>	$areasize,
			"areasizeuint"			=>	$areasizeuint,
			"stallnumber"			=>	$stallnumber
		];

		array_push($arrayGetStalls, $rows);

	}
	echo json_encode($arrayGetStalls);
?>