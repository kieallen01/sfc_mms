<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	$strGetStallOwners = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,

			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,

			tbl_stall_applicant.fld_address_province_code,
			tbl_address_province.fld_address_province_desc,
			tbl_stall_applicant.fld_address_citymun_code,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_stall_applicant.fld_address_brgy_code,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_stall_applicant.fld_stall_application_dob,
			tbl_stall_applicant.fld_stall_application_citizenship,
			tbl_stall_applicant.fld_stall_application_cstatus,
			tbl_stall_applicant.fld_stall_application_gender,
			
			tbl_stall.fld_market_facility_id,
			tbl_stall.fld_bldg_id,
			tbl_stall.fld_section_id,
			tbl_stall.fld_stall_number
		FROM
			tbl_stall_applicant
				INNER JOIN
					tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
				INNER JOIN
					tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
				INNER JOIN
					tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
				LEFT JOIN
					tbl_stall ON tbl_stall_applicant.fld_stall_application_id = tbl_stall.fld_stall_application_id
		GROUP BY
			tbl_stall_applicant.fld_stall_application_id;
	";
	$cmdGetStallOwners = $conn->query($strGetStallOwners);
	$arrayGetStallOwners = [];
	$arrayStallsOwned = [];
	while($data=$cmdGetStallOwners->fetch(PDO::FETCH_BOTH)) {
		$applicationid 			= $data[0];
		$applicantfname 		= $data[1];
		$applicantmname 		= $data[2];
		$applicantlname 		= $data[3];
		$applicantprovcode 		= $data[4];
		$applicantprovdesc 		= $data[5];
		$applicantcitymuncode 	= $data[6];
		$applicantcitymundesc 	= $data[7];
		$applicantbrgycode 		= $data[8];
		$applicantbrgydesc 		= $data[9];
		$applicantdob 			= $data[10];
		$applicantcitizenship 	= $data[11];
		$applicantcivilstat 	= $data[12];
		$applicantgender 		= $data[13];
		// $marketfacilityid 		= $data[14];
		// $bldgid 				= $data[15];
		// $sectionid 				= $data[16];
		// $stallnumber 			= $data[17];
		$rows = [
			"applicationid"			=>$applicationid,
			"applicantfname"		=>$applicantfname,
			"applicantmname"		=>$applicantmname,
			"applicantlname"		=>$applicantlname,
			"applicantprovcode"		=>$applicantprovcode,
			"applicantprovdesc"		=>$applicantprovdesc,
			"applicantcitymuncode"	=>$applicantcitymuncode,
			"applicantcitymundesc"	=>$applicantcitymundesc,
			"applicantbrgycode"		=>$applicantbrgycode,
			"applicantbrgydesc"		=>$applicantbrgydesc,
			"applicantdob"			=>$applicantdob,
			"applicantcitizenship"	=>$applicantcitizenship,
			"applicantcivilstat"	=>$applicantcivilstat,
			"applicantgender"		=>$applicantgender,
		];
		array_push($arrayGetStallOwners,$rows);
	}
	echo json_encode($arrayGetStallOwners);
	// echo json_encode($arrayStallsOwned);
?>