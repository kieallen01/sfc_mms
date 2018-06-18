<?php
	include ("../includes/connection.php");

	$strGetAreas = "
		SELECT
			tbl_area.fld_area_id,
			tbl_area.fld_area_desc,
			tbl_area.fld_area_size,
			tbl_area.fld_area_sizeunit
		FROM 
			tbl_area;
	";
	$cmdGetAreas = $conn->query($strGetAreas);
	$arrayGetAreas = [];
	while ($data=$cmdGetAreas->fetch(PDO::FETCH_BOTH)) {
		$areaid 		= $data[0];
		$areadesc 		= $data[1];
		$areasize 		= $data[2];
		$areasizeunit 	= $data[3];
		$rows = [
			"areaid"	=>	$areaid,
			"areadesc"	=>	$areadesc,
			"areasize"	=>	$areasize,
			"areaunit"	=>	$areasizeunit
		];
		array_push($arrayGetAreas, $rows);
	}
	echo json_encode($arrayGetAreas);
?>