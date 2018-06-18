<?php
	include("../../includes/connection.php");

	$strGetBusinessType = "
		SELECT 
			tbl_businesstype.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc
		FROM 
			tbl_businesstype;

		";
	$cmdGetBusinessType = $conn->query($strGetBusinessType);
	$arrayBusinessType = [];

	while ($data=$cmdGetBusinessType->fetch(PDO::FETCH_BOTH)) {
		$businessid = $data[0];
		$businessdesc = $data[1];
		$rows = [
			'businessid'   => $businessid,
			'businessdesc' => $businessdesc
		];
		array_push($arrayBusinessType, $rows);
	}
	echo json_encode($arrayBusinessType);
?>