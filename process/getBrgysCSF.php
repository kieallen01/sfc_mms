<?php
	include('../../includes/connection.php');
	$strGetBrgysSfc = "
	SELECT
		tbl_address_brgy.fld_address_citymun_code,
		tbl_address_citymun.fld_address_citymun_desc,

		tbl_address_brgy.fld_address_brgy_code,
		tbl_address_brgy.fld_address_brgy_desc
	FROM tbl_address_brgy
		INNER JOIN tbl_address_citymun ON tbl_address_brgy.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
	WHERE
		tbl_address_brgy.fld_address_citymun_code = '13314';";
	$arrayBrgys = [];
	$cmdGetBrgysSfc = $conn->query($strGetBrgysSfc);
	while ($data = $cmdGetBrgysSfc->fetch(PDO::FETCH_BOTH)) {
		$municipalcode = $data[0];
		$barangayscode = $data[2];
		$barangays = $data[3];
		$rows = 
		[	
			'barangayscode'	=> $barangayscode,
			'barangays' 	=> $barangays
		];
		array_push($arrayBrgys, $rows);
	}
	echo json_encode($arrayBrgys);

?>