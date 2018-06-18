<?php
	include('../includes/connection.php');

	$strGetStallOwnerAddress = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,
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
		WHERE
			tbl_stall_applicant.fld_stall_application_id = '".$_POST['applicantid']."'
	";
	
	$cmdGetStallOwnerAddress = $conn->query($strGetStallOwnerAddress);
	$arrayGetStallOwnerAddress = [];

	while ($data=$cmdGetStallOwnerAddress->fetch(PDO::FETCH_BOTH)) {
		$address = $data[3].', '.$data[2].' '.$data[1];

		$rows = [
			'address'=>$address
		];
		array_push($arrayGetStallOwnerAddress, $rows);
	}
	echo json_encode($arrayGetStallOwnerAddress);
?>