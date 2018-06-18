<?php
	include("../includes/connection.php");

	$strGetSectionForCmb = "
		SELECT
			tbl_section.fld_section_id,
			tbl_section.fld_section_code,
			tbl_section.fld_section_name
		FROM
			tbl_section
		INNER JOIN
			tbl_market_facility ON tbl_section.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		INNER JOIN
			tbl_bldg ON tbl_section.fld_bldg_id = tbl_bldg.fld_bldg_id
		WHERE
			tbl_section.fld_bldg_id = '".$_POST["buildingid"]."'
	";

	$cmdGetSectionForCmb = $conn->query($strGetSectionForCmb);
	$arrayGetSectionForCmb = [];

	while ($data=$cmdGetSectionForCmb->fetch(PDO::FETCH_BOTH)) {
		$sectionid 	 = $data[0];
		$sectioncode = $data[1];
		$sectionname = $data[2];

		$rows = [
			'sectionid'    =>  $sectionid,
			'sectioncode'  =>  $sectioncode,
			'sectionname'  =>  $sectionname
		];
	array_push($arrayGetSectionForCmb, $rows);
	}
	echo json_encode($arrayGetSectionForCmb);
?>