<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	$strGetStallsOwned = "
		SELECT
			tbl_stall.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,

			tbl_stall.fld_bldg_id,
			tbl_bldg.fld_bldg_name,

			tbl_stall.fld_section_id,
			tbl_section.fld_section_name,

			tbl_stall.fld_area_id,
			tbl_area.fld_area_size,
			tbl_area.fld_area_sizeunit,

			tbl_stall.fld_stall_number,

			tbl_rentalfee.fld_rentalfee_fee
		FROM
			tbl_stall
				INNER JOIN
					tbl_market_facility ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
				INNER JOIN
					tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
				INNER JOIN
					tbl_section ON tbl_stall.fld_section_id = tbl_section.fld_section_id
				INNER JOIN
					tbl_area ON tbl_stall.fld_area_id = tbl_area.fld_area_id
				INNER JOIN
					tbl_rentalfee ON tbl_stall.fld_area_id = tbl_rentalfee.fld_area_id
		WHERE
			tbl_stall.fld_stall_application_id = '".$_POST["applicationid"]."';
	";
	$cmdGetStallsOwned = $conn->query($strGetStallsOwned);
	$arrayStallsOwned = [];
	while($data=$cmdGetStallsOwned->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid 		= $data[0];
		$marketfacilityname 	= $data[1];
		$bldgid 				= $data[2];
		$bldgname 				= $data[3];
		$sectionid 				= $data[4];
		$sectionname 			= $data[5];
		$areaid 				= $data[6];
		$areasize 				= $data[7];
		$areasizeunit 			= $data[8];
		$stallnumber 			= $data[9];
		$rentalfee 				= $data[10];
		$stallsowned = [
			"marketfacilityid"		=>$marketfacilityid,
			"marketfacilityname"	=>$marketfacilityname,
			"bldgid"				=>$bldgid,
			"bldgname"				=>$bldgname,
			"sectionid"				=>$sectionid,
			"sectionname"			=>$sectionname,
			"areaid"				=>$areaid,
			"areasize"				=>$areasize,
			"areasizeunit"			=>$areasizeunit,
			"stallnumber"			=>$stallnumber,
			"rentalfee"				=>$rentalfee
		];
		array_push($arrayStallsOwned,$stallsowned);
	}
	echo json_encode($arrayStallsOwned);
?>