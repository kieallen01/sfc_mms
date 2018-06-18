<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	if ($_GET["q"] == "all") {
		$strGetStalls = "
			SELECT
				tbl_stall.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
				
				tbl_stall.fld_bldg_id,
				tbl_bldg.fld_bldg_name,
				
				tbl_stall.fld_section_id,
				tbl_section.fld_section_name,
				
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number) AS 'Stall Number',
				tbl_stall.fld_stall_number,

				tbl_stall.fld_area_id,
				tbl_area.fld_area_desc,
				tbl_area.fld_area_size,
				tbl_area.fld_area_sizeunit,
				
				tbl_stall.fld_stall_application_id,
				tbl_stall_applicant.fld_stall_applicant_fname,
				tbl_stall_applicant.fld_stall_applicant_mname,
				tbl_stall_applicant.fld_stall_applicant_lname
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
					LEFT JOIN
						tbl_stall_applicant ON tbl_stall.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id;
			";
			$cmdGetStalls = $conn->query($strGetStalls);
			$arrayGetStalls = [];
	
			while ($data=$cmdGetStalls->fetch(PDO::FETCH_BOTH)) {
				$marketfacilityid 		= $data[0];
				$marketfacilityname 	= $data[1];
				$bldgid 				= $data[2];
				$bldgname 				= $data[3];
				$sectionid 				= $data[4];
				$sectionname 			= $data[5];
				$stallcode 				= $data[6];
				$stallnumber 			= $data[7];
				$areaid 				= $data[8];
				$areadesc 				= $data[9];
				$areasize 				= $data[10];
				$areasizeunit 			= $data[11];
				$stallapplicationid 	= $data[12];
				$stallapplicantfname 	= $data[13];
				$stallapplicantmname 	= $data[14];
				$stallapplicantlname 	= $data[15];
				$rows = [
					"marketfacilityid"		=>	$marketfacilityid,
					"marketfacilityname"	=>	$marketfacilityname,
					"bldgid"				=>	$bldgid,
					"bldgname"				=>	$bldgname,
					"sectionid"				=>	$sectionid,
					"sectionname"			=>	$sectionname,
					"stallcode"				=>	$stallcode,
					"stallnumber"			=>	$stallnumber,
					"areaid"				=>	$areaid,
					"areadesc"				=>	$areadesc,
					"areasize"				=>	$areasize,
					"areasizeunit"			=>	$areasizeunit,
					"stallapplicationid"	=>	$stallapplicationid,
					"stalllessee"			=>	trim($stallapplicantfname." ".$stallapplicantmname." ".$stallapplicantlname, " ")
				];
	
				array_push($arrayGetStalls, $rows);
	
			}
			echo json_encode($arrayGetStalls);
	}
	else if ($_GET["q"] == "search") {
		$strGetStalls = "
			SELECT
				tbl_stall.fld_market_facility_id,
				tbl_market_facility.fld_market_facility_name,
				
				tbl_stall.fld_bldg_id,
				tbl_bldg.fld_bldg_name,
				
				tbl_stall.fld_section_id,
				tbl_section.fld_section_name,
				
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number) AS 'Stall Number',
				tbl_stall.fld_stall_number,

				tbl_stall.fld_area_id,
				tbl_area.fld_area_desc,
				tbl_area.fld_area_size,
				tbl_area.fld_area_sizeunit,
				
				tbl_stall.fld_stall_application_id,
				tbl_stall_applicant.fld_stall_applicant_fname,
				tbl_stall_applicant.fld_stall_applicant_mname,
				tbl_stall_applicant.fld_stall_applicant_lname
			FROM
				tbl_stall
					INNER JOIN
						tbl_market_facility ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
					INNER JOIN
						tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
					INNER JOIN
						tbl_section ON tbl_stall.fld_section_id = tbl_section.fld_section_id
					INNER JOIN
						tbl_area ON tbl_area.fld_area_id = tbl_area.fld_area_id
					LEFT JOIN
						tbl_stall_applicant ON tbl_stall.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id
			WHERE
				tbl_stall.fld_stall_number = '".$_POST['stallnumber']."';
		";
			$cmdGetStalls = $conn->query($strGetStalls);
			$arrayGetStalls = [];
	
			while ($data=$cmdGetStalls->fetch(PDO::FETCH_BOTH)) {
				$marketfacilityid 		= $data[0];
				$marketfacilityname 	= $data[1];
				$bldgid 				= $data[2];
				$bldgname 				= $data[3];
				$sectionid 				= $data[4];
				$sectionname 			= $data[5];
				$stallcode 				= $data[6];
				$stallnumber 			= $data[7];
				$areaid 				= $data[8];
				$areadesc 				= $data[9];
				$areasize 				= $data[10];
				$areasizeunit 			= $data[11];
				$stallapplicationid 	= $data[12];
				$stallapplicantfname 	= $data[13];
				$stallapplicantmname 	= $data[14];
				$stallapplicantlname 	= $data[15];
				$rows = [
					"marketfacilityid"		=>	$marketfacilityid,
					"marketfacilityname"	=>	$marketfacilityname,
					"bldgid"				=>	$bldgid,
					"bldgname"				=>	$bldgname,
					"sectionid"				=>	$sectionid,
					"sectionname"			=>	$sectionname,
					"stallcode"				=>	$stallcode,
					"stallnumber"			=>	$stallnumber,
					"areaid"				=>	$areaid,
					"areadesc"				=>	$areadesc,
					"areasize"				=>	$areasize,
					"areasizeunit"			=>	$areasizeunit,
					"stallapplicationid"	=>	$stallapplicationid,
					"stalllessee"			=>	trim($stallapplicantfname." ".$stallapplicantmname." ".$stallapplicantlname, " ")
				];
	
				array_push($arrayGetStalls, $rows);
	
			}
			echo json_encode($arrayGetStalls);
	}
?>