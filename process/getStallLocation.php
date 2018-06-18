<?php
	include ("../includes/connection.php");

	header ("Content-Type: application/json");
	if ($_GET["q"] == "marketfacility") {
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
	}
	else if ($_GET["q"] == "building") {
		$strGetBuildingForCmb = "
			SELECT
				tbl_bldg.fld_bldg_id,
				tbl_bldg.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
				tbl_bldg.fld_bldg_name
			FROM tbl_bldg
			 	INNER JOIN tbl_market_facility ON tbl_bldg.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
			WHERE
				tbl_market_facility.fld_market_facility_id = '".$_POST['marketfacilityid']."'
		";

		$cmdGetBuildingForCmb = $conn->query($strGetBuildingForCmb);
		$arrayGetBuildingForCmb = [];

		while ($data=$cmdGetBuildingForCmb->fetch(PDO::FETCH_BOTH)) {
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
			array_push($arrayGetBuildingForCmb, $rows);
		}
		echo json_encode($arrayGetBuildingForCmb);
	}
	else if ($_GET["q"] == "section") {
		$strGetSectionForCmb = "
			SELECT
				tbl_section.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
			 	tbl_section.fld_bldg_id,
			 	tbl_bldg.fld_bldg_name,
				tbl_section.fld_section_id,
				tbl_section.fld_section_name
			FROM tbl_section 
				INNER JOIN tbl_market_facility ON tbl_section.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
			 	INNER JOIN tbl_bldg ON tbl_section.fld_bldg_id = tbl_bldg.fld_bldg_id
			WHERE
				tbl_section.fld_bldg_id = '".$_POST["buildingid"]."'
		";

		$cmdGetSectionForCmb = $conn->query($strGetSectionForCmb);
		$arrayGetSectionForCmb = [];

		while ($data=$cmdGetSectionForCmb->fetch(PDO::FETCH_BOTH)) {
			$marketfacilityid = $data[0];
			$marketfacilityname = $data[1];
			$bldgid = $data[2];
			$bldgname = $data[3];
			$sectionid = $data[4];
			$sectionname = $data[5];

			$rows = [
				"marketfacilityid"		=>	$marketfacilityid,
				"marketfacilityname"	=>	$marketfacilityname,
				"bldgid"				=>	$bldgid,
				"bldgname"				=>	$bldgname,
				"sectionid"				=>	$sectionid,
				"sectionname"			=>	$sectionname
			];
		array_push($arrayGetSectionForCmb, $rows);
		}
		echo json_encode($arrayGetSectionForCmb);
	}
	else if ($_GET["q"] == "stall") {
		$strGetStallForCmb = "
			SELECT
				tbl_stall.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
				
				tbl_stall.fld_bldg_id,
				tbl_bldg.fld_bldg_name,
				
				tbl_stall.fld_section_id,
				tbl_section.fld_section_name,

				tbl_stall.fld_area_id,
				tbl_area.fld_area_desc,
				tbl_area.fld_area_size,
				tbl_area.fld_area_sizeunit,
				
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number) AS 'Stall Number',
				tbl_stall.fld_stall_number
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
			WHERE
				tbl_stall.fld_section_id = '".$_POST["sectionid"]."';
		";
		$cmdGetStallForCmb = $conn->query($strGetStallForCmb);
		$arrayGetStallForCmb = [];
		while ($data=$cmdGetStallForCmb->fetch(PDO::FETCH_BOTH)) {
			$marketfacilityid = $data[0];
			$marketfacilityname = $data[1];
			$bldgid = $data[2];
			$bldgname = $data[3];
			$sectionid = $data[4];
			$sectionname = $data[5];
			$areaid = $data[6];
			$areadesc = $data[7];
			$areasize = $data[8];
			$areasizeuint = $data[9];
			$stallcode = $data[10];
			$stallnumber = $data[11];
			$rows = [
				"marketfacilityid"		=>$marketfacilityid,
				"marketfacilityname"	=>$marketfacilityname,
				"bldgid"				=>$bldgid,
				"bldgname"				=>$bldgname,
				"sectionid"				=>$sectionid,
				"sectionname"			=>$sectionname,
				"areaid"				=>$areaid,
				"areadesc"				=>$areadesc,
				"areasize"				=>$areasize,
				"areasizeuint"			=>$areasizeuint,
				"stallcode"				=>$stallcode,
				"stallnumber"			=>$stallnumber
			];

			array_push($arrayGetStallForCmb, $rows);
		}
		echo json_encode($arrayGetStallForCmb);
	}
	else if ($_GET["q"] == "load_all_stalls") {
		$strGetStallForCmb = "
			SELECT
				tbl_stall.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
				
				tbl_stall.fld_bldg_id,
				tbl_bldg.fld_bldg_name,
				
				tbl_stall.fld_section_id,
				tbl_section.fld_section_name,

				tbl_stall.fld_area_id,
				tbl_area.fld_area_desc,
				tbl_area.fld_area_size,
				tbl_area.fld_area_sizeunit,
				
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number) AS 'Stall Number',
				tbl_stall.fld_stall_number,
				tbl_stall.fld_stall_application_id
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
			WHERE
				tbl_stall.fld_stall_application_id IS NULL;
		";
		$cmdGetStallForCmb = $conn->query($strGetStallForCmb);
		$arrayGetStallForCmb = [];
		while ($data=$cmdGetStallForCmb->fetch(PDO::FETCH_BOTH)) {
			$marketfacilityid = $data[0];
			$marketfacilityname = $data[1];
			$bldgid = $data[2];
			$bldgname = $data[3];
			$sectionid = $data[4];
			$sectionname = $data[5];
			$areaid = $data[6];
			$areadesc = $data[7];
			$areasize = $data[8];
			$areasizeuint = $data[9];
			$stallcode = $data[10];
			$stallnumber = $data[11];
			$rows = [
				"marketfacilityid"		=>$marketfacilityid,
				"marketfacilityname"	=>$marketfacilityname,
				"bldgid"				=>$bldgid,
				"bldgname"				=>$bldgname,
				"sectionid"				=>$sectionid,
				"sectionname"			=>$sectionname,
				"areaid"				=>$areaid,
				"areadesc"				=>$areadesc,
				"areasize"				=>$areasize,
				"areasizeuint"			=>$areasizeuint,
				"stallcode"				=>$stallcode,
				"stallnumber"			=>$stallnumber
			];

			array_push($arrayGetStallForCmb, $rows);
		}
		echo json_encode($arrayGetStallForCmb);
	}
?>