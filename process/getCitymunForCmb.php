<?php
	include('../../includes/connection.php');

	$strGetCitymunForCmb = "
		SELECT
			tbl_address_citymun.fld_address_citymun_code,
			tbl_address_citymun.fld_address_citymun_desc
		FROM 
			tbl_address_citymun
		WHERE
			tbl_address_citymun.fld_address_province_code = '".$_POST['provincecode']."'
	";

	$cmdGetCitymunForCmb = $conn->query($strGetCitymunForCmb);
	$arrayGetCitymunForCmb = [];

	while ($data=$cmdGetCitymunForCmb->fetch(PDO::FETCH_BOTH)) {
		$citymuncode = $data[0];
		$citymundesc = $data[1];

		$rows = [
			'citymuncode' => $citymuncode,
			'citymundesc' => $citymundesc
		];
		array_push($arrayGetCitymunForCmb, $rows);
	}
	echo json_encode($arrayGetCitymunForCmb);
?>