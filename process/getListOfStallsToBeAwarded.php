<?php
	include ('../includes/connection.php');

	$strGetListOfStallToBeAwarded = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,

			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,


			tbl_stall_applicant.fld_address_province_code,
			tbl_stall_applicant.fld_address_citymun_code,
			tbl_stall_applicant.fld_address_brgy_code,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_businesstype.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc
		FROM
			tbl_stall_applicant
		INNER JOIN
			tbl_stall_application ON tbl_stall_applicant.fld_stall_application_id = tbl_stall_application.fld_stall_application_id
		INNER JOIN
			tbl_businesstype ON tbl_stall_application.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		WHERE
			tbl_stall_application.fld_stall_application_status = '2'
	";

	$cmdGetListOfStallToBeAwarded = $conn->query($strGetListOfStallToBeAwarded);
	$arrayGetListOfStallToBeAwarded = [];

	while ($data=$cmdGetListOfStallToBeAwarded->fetch(PDO::FETCH_BOTH)) {
		$applicantid  = $data[0];
		$fullname 	  = ucwords($data[3]).', '.ucwords($data[1]).' '.substr(ucwords($data[2]), 0,1).'.';
		$address 	  = $data[9].', '.$data[8].' '.$data[7];
		$businesstype = $data[11];

		$rows = [
			'applicantid' 	=> $applicantid,
			'fullname' 		=> $fullname,
			'address' 		=> $address,
			'businesstype'	=> $businesstype
		];
		array_push($arrayGetListOfStallToBeAwarded, $rows);
	}
	echo json_encode($arrayGetListOfStallToBeAwarded);

?>