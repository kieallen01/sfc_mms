<?php
	include("../includes/connection.php");

	$strGetStallsToReassign = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_area.fld_area_desc,
			tbl_market_facility.fld_market_facility_name,
			tbl_bldg.fld_bldg_name,
			tbl_section.fld_section_name,
			tbl_stall.fld_stall_number

		FROM
			tbl_stall
		INNER JOIN 
			tbl_stall_applicant ON tbl_stall.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		INNER JOIN
			tbl_area ON tbl_stall.fld_area_id = tbl_area.fld_area_id
		INNER JOIN
			tbl_market_facility ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		INNER JOIN
			tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
		INNER JOIN
			tbl_section ON tbl_stall.fld_section_id = tbl_section.fld_section_id
		WHERE
			tbl_stall.fld_stall_application_id IS NOT NULL
		";

	$cmdGetStallsToReassign = $conn->query($strGetStallsToReassign);
	$arrayGetStallsToReassign = [];

	while ($data=$cmdGetStallsToReassign->fetch(PDO::FETCH_BOTH)) {
		$applicantid 		= $data[0];
		$fullname			= $data[3].', '.$data[1].' '.$data[2].'.';
		$address 			= $data[6].', '.$data[5].' '.$data[4];
		$stallinfo			= $data[7].' - '.$data[8].' - '.$data[9].' - '.$data[10];
		$stallnumber 		= $data[11];

		$rows = [
			'applicantid'		=>$applicantid,
			'fullname'			=>$fullname,
			'address'			=>$address,
			'stallinfo'			=>$stallinfo,
			'stallnumber'		=>$stallnumber
		];
		array_push($arrayGetStallsToReassign, $rows);
	}
	echo json_encode($arrayGetStallsToReassign);

?>