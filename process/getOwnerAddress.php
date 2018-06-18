<?php
	include ("../includes/connection.php");

	header ("Content-Type: application/json");
	$strGetOwnerAddress = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,

			tbl_stall_applicant.fld_address_province_code,
			tbl_address_province.fld_address_province_desc,

			tbl_stall_applicant.fld_address_citymun_code,
			tbl_address_citymun.fld_address_citymun_desc,

			tbl_stall_applicant.fld_address_brgy_code,
			tbl_address_brgy.fld_address_brgy_desc
		FROM
			tbl_stall_applicant
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		WHERE
			tbl_stall_applicant.fld_stall_application_id = '".$_POST["applicantid"]."';
	";
	$cmdGetOwnerAddress = $conn->query($strGetOwnerAddress);
	$arrayGetOwnerAddress = [];
	while ($data=$cmdGetOwnerAddress->fetch(PDO::FETCH_BOTH)) {
		$applicationid 	= $data[0];
		$provincecode 	= $data[1];
		$provincedesc 	= $data[2];
		$citymuncode 	= $data[3];
		$citymundesc 	= $data[4];
		$brgycode 		= $data[5];
		$brgydesc 		= $data[6];
		$rows = [
			"applicationid"	=>	$applicationid,
			"provincecode"	=>	$provincecode,
			"provincedesc"	=>	$provincedesc,
			"citymuncode"	=>	$citymuncode,
			"citymundesc"	=>	$citymundesc,
			"brgycode"		=>	$brgycode,
			"brgydesc"		=>	$brgydesc
		];
		array_push($arrayGetOwnerAddress,$rows);
	}
	echo json_encode($arrayGetOwnerAddress);
?>