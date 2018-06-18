<?php 
	include('../includes/connection.php');

	$strGetOwnersForReassignment = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc

		FROM
			tbl_stall_applicant
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code

	";

	$cmdGetOwnersForReassignment = $conn->query($strGetOwnersForReassignment);
	$arrayGetOwnersForReassignment = [];

	while ($data=$cmdGetOwnersForReassignment->fetch(PDO::FETCH_BOTH)) {
		$applicantid = $data[0];
		$fullname 	 = $data[3].', '.$data[1].' '.$data[2].'.';
		$address 	 = $data[6].', '.$data[5].' '.$data[4];

		$rows = [
			'applicantid'	=>	$applicantid,
			'fullname'		=>	$fullname,
			'address' 		=>	$address
		];
		array_push($arrayGetOwnersForReassignment, $rows);
	}
	echo json_encode($arrayGetOwnersForReassignment);
?>