<?php
	include ("../includes/connection.php");

	$strSelectSection = "
		SELECT
			tbl_section.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,
		 	tbl_section.fld_bldg_id,
		 	tbl_bldg.fld_bldg_name,
			tbl_section.fld_section_id,
			tbl_section.fld_section_name
		FROM tbl_section 
			INNER JOIN tbl_market_facility ON tbl_section.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		 	INNER JOIN tbl_bldg ON tbl_section.fld_bldg_id = tbl_bldg.fld_bldg_id
		 WHERE
		 	tbl_section.fld_section_id = '".$_POST["cmbAddGateSectionID"]."';
	";
	$cmdSelectSection = $conn->query($strSelectSection);
	while ($data=$cmdSelectSection->fetch(PDO::FETCH_BOTH)) {
		$marketfacilityid = $data[0];
		$marketfacilityname = $data[1];
		$bldgid = $data[2];
		$bldgname = $data[3];
		$sectionid = $data[4];
		$sectionname = $data[5];
	}

	$strAddGate = $conn->prepare("
		INSERT INTO
			tbl_gate
		VALUES (
			NULL,
			'".$_POST["txtAddGateName"]."',
			'".$marketfacilityid."',
			'".$bldgid."',
			'".$sectionid."'
		);
	");

	echo ($strAddGate->execute());
?>