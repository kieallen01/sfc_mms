<?php
	include ("../includes/connection.php");

	$strselectSpouseInfo = "
		SELECT 
			tbl_stall_applicant.fld_stall_application_id,
			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_fname,
			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_mname,
			tbl_stall_applicant_spouse.fld_stall_applicant_spouse_lname,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc
		FROM
			tbl_stall_applicant
		INNER JOIN 
			tbl_stall_applicant_spouse ON tbl_stall_applicant.fld_stall_application_id = tbl_stall_applicant_spouse.fld_stall_application_id
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN 
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		WHERE
			tbl_stall_applicant.fld_stall_application_id = '1'
	";

	$cmdSelectSpouseInfo = $conn->query($strselectSpouseInfo);
	$arraySelectSpouseInfo = [];

	while ($data=$cmdSelectSpouseInfo->fetch(PDO::FETCH_BOTH)) {
		$sfullname 	  = $data[2].', '.$data[0].' '.$data[1];
		$saddress     = $data[6].', '.$data[5].' '.$data[4];

		$rows = [
			'sfullname' 	=> $sfullname,
			'saddress' 		=> $saddress
		];
		array_push($arraySelectSpouseInfo, $rows);
	}
	echo json_encode($arraySelectSpouseInfo);
?>