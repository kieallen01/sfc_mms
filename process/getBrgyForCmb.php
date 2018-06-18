<?php
	include('../../includes/connection.php');


	$strGetBrgyForCmb = "
		SELECT
			tbl_address_brgy.fld_address_brgy_code,
			tbl_address_brgy.fld_address_brgy_desc
		FROM
			tbl_address_brgy
		WHERE
			tbl_address_brgy.fld_address_citymun_code = '".$_POST['citymuncode']."'
	";

	$cmdGetBrgyForCmb = $conn->query($strGetBrgyForCmb);
	$arrayGetBrgyForCmb = [];

	while ($data=$cmdGetBrgyForCmb->fetch(PDO::FETCH_BOTH)) {
		$brgycode = $data[0];
		$brgydesc = $data[1];

		$rows = [
			'brgycode' => $brgycode,
			'brgydesc' => $brgydesc
		];
		array_push($arrayGetBrgyForCmb, $rows);
	}
	echo json_encode($arrayGetBrgyForCmb);
?>