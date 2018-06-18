<?php
	include('../includes/connection.php');

	header ("Content-Type: application/json");
	$strGetStallAwardContent = "
		SELECT
			tbl_stall.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,

			tbl_stall.fld_bldg_id,
			tbl_bldg.fld_bldg_name,

			tbl_stall.fld_section_id,
			tbl_section.fld_section_name,

			tbl_stall.fld_stall_number,

			tbl_stall.fld_stall_application_id,
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,
			tbl_stall_application.fld_stall_application_effectivity,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_stall_application.fld_stall_application_notes
		FROM
			tbl_stall
		INNER JOIN
			tbl_market_facility ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		INNER JOIN
			tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
		INNER JOIN
			tbl_section ON tbl_stall.fld_section_id = tbl_section.fld_section_id
		INNER JOIN
			tbl_stall_applicant ON tbl_stall.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		INNER JOIN
			tbl_stall_application ON tbl_stall.fld_stall_application_id = tbl_stall_application.fld_stall_application_id
		WHERE
			tbl_stall.fld_stall_application_id = '".$_POST["applicantid"]."'
		GROUP BY
			tbl_stall.fld_stall_application_id;
	";
	$cmdGetStallAwardContent = $conn->query($strGetStallAwardContent);
	$arrayGetStallAwardContent = [];
	while ($data=$cmdGetStallAwardContent->fetch(PDO::FETCH_BOTH)) {
		//MARKET FACILITY
		$marketfacilityid 		= $data[0];
		$marketfacilityname 	= $data[1];
		$bldgid 				= $data[2];
		$bldgname 				= $data[3];
		$sectionid 				= $data[4];
		$sectionname 			= $data[5];
		$stallnumber 			= $data[6];
		$stallapplicationid 	= $data[7];
		$ownerfname				= $data[8];
		$ownermname				= $data[9];
		$ownerlname				= $data[10];
		$dateofeffectivity		= $data[11];
		$provincedesc 			= $data[12];
		$citymundesc 			= $data[13];
		$brgydesc 				= $data[14];
		$stallapplicationnotes	= $data[15];

		$stalls					= "";
		$strGetStallsAssigned	= "
			SELECT
			-- 	tbl_stall.fld_bldg_id,
			-- 	tbl_bldg.fld_bldg_name,
			-- 	tbl_stall.fld_stall_number
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number)
			FROM
				tbl_stall
					INNER JOIN
						tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
			WHERE
				tbl_stall.fld_stall_application_id = '".$stallapplicationid."';
		";
		$cmdGetStallsAssigned = $conn->query($strGetStallsAssigned);
		while ($data2=$cmdGetStallsAssigned->fetch(PDO::FETCH_BOTH)) {
			$stalls = $stalls . ', ' . $data2[0];
		}

		$rows = [
			"marketfacilityname"	=>$marketfacilityname,
			"bldgname"				=>$bldgname,
			"sectionname"			=>$sectionname,
			"stalls"				=>trim($stalls,", "),
			"ownerfname"			=>$ownerfname,
			"ownermname"			=>$ownermname,
			"ownerlname"			=>$ownerlname,
			"dateofeffectivity"		=>$dateofeffectivity,
			"provincedesc"			=>$provincedesc,
			"citymundesc"			=>$citymundesc,
			"brgydesc"				=>$brgydesc,
			"stallapplicationnotes"	=>$stallapplicationnotes,
		];

		array_push($arrayGetStallAwardContent,$rows);
	}
	echo json_encode($arrayGetStallAwardContent);

?>