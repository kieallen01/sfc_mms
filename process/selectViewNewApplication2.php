<?php
	include("../includes/connection.php");

	header("Content-type: application/json");
	$strSelectEditApplication = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_stall_applicant.fld_stall_application_dob,
			tbl_stall_applicant.fld_stall_application_citizenship,
			tbl_stall_applicant.fld_stall_application_cstatus,
			tbl_stall_applicant.fld_stall_application_photo,
			tbl_stall_applicant.fld_stall_application_gender,

			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_fname,
			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_mname,
			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_lname,

			tbl_businesstype.fld_businesstype_desc,
			tbl_ownershiptype.fld_ownershiptype_desc,

			tbl_stall_application.fld_stall_application_employed,
			tbl_stall_application.fld_stall_application_office,
			tbl_stall_application.fld_stall_application_otherbusiness,
			tbl_stall_application.fld_stall_application_businesspermit,
			tbl_stall_application.fld_stall_application_capital,
			tbl_stall_application.fld_stall_application_date
		FROM
			tbl_stall_applicant
		INNER JOIN 
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		INNER JOIN
			tbl_stall_applicant_spouse ON  tbl_stall_applicant.fld_stall_application_id = tbl_stall_applicant_spouse.fld_stall_application_id
		INNER JOIN
			tbl_stall_application ON tbl_stall_applicant.fld_stall_application_id = tbl_stall_application.fld_stall_application_id
		INNER JOIN
			tbl_businesstype ON tbl_stall_application.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
		INNER JOIN
			tbl_ownershiptype ON tbl_stall_application.fld_ownershiptype_id = tbl_ownershiptype.fld_ownershiptype_id
		WHERE
			tbl_stall_applicant.fld_stall_application_id = '2'
	";

	$cmdSelectEditApplication = $conn->query($strSelectEditApplication);
	$arraySelectEditApplication = [];

	while ($data=$cmdSelectEditApplication->fetch(PDO::FETCH_BOTH)) {
		$applicantid 	= $data[0];
		$fullname		= $data[3].', '.$data[1].' '.$data[2].'.';
		$address		= $data[6].', '.$data[5].' '.$data[4];
		$dob 			= $data[7];
		$citizenship 	= $data[8];
		$cstatus 		= $data[9];
		$photo 			= $data[10];
		$gender 		= $data[11];
		$sfullname		= trim($data[14].', '.$data[12].' '.$data[13].'.', ', .');
		$businesstype 	= $data[15];
		$ownershiptype 	= $data[16];
		$employed 		= $data[17];
		$office 		= $data[18];
		$otherbusiness  = $data[19];
		$businesspermit = $data[20];
		$capital 		= $data[21];
		$date 			= $data[22];

		$rows = [
			'applicantid'	=> $applicantid,
			'fullname'		=> $fullname,
			'address'		=> $address,
			'dob'			=> $dob,
			'citizenship'	=> $citizenship,
			'cstatus'		=> $cstatus,
			'photo'			=> $photo,
			'gender'		=> $gender,
			'sfullname'		=> $sfullname,
			'businesstype'	=> $businesstype,
			'ownershiptype'	=> $ownershiptype,
			'employed'		=> $employed,
			'office'		=> $office,
			'otherbusiness'	=> $otherbusiness,
			'businesspermit'=> $businesspermit,
			'capital'		=> $capital,
			'date'			=> $date

		];
		array_push($arraySelectEditApplication, $rows);
	}
	echo json_encode($arraySelectEditApplication);
?>