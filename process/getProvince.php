<?php
include("../../includes/connection.php");
$strGetProvinces = "
	SELECT
		tbl_address_province.fld_address_province_code,
		tbl_address_province.fld_address_province_desc
	FROM
		tbl_address_province
	";

	$cmdGetProvinces = $conn->query($strGetProvinces);
	$arrayGetProvinces = [];

	while ($data=$cmdGetProvinces->fetch(PDO::FETCH_BOTH)) {

		$provincecode = $data[0];
		$provincedesc = $data[1];

		$rows = [
			'provincecode' => $provincecode,
			'provincedesc' => $provincedesc
		];
		array_push($arrayGetProvinces, $rows);
	}
	echo json_encode($arrayGetProvinces);
?>