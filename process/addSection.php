<?php
	include ("../includes/connection.php");

	$strSelectBldg = "
		SELECT
			tbl_bldg.fld_bldg_id,
			tbl_bldg.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,
			tbl_bldg.fld_bldg_name
		FROM tbl_bldg
		 	INNER JOIN tbl_market_facility ON tbl_bldg.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		WHERE tbl_bldg.fld_bldg_id = '".$_POST["cmbAddSectionBuildingID"]."';
	";
	$cmdSelectBldg = $conn->query($strSelectBldg);
	while ($data=$cmdSelectBldg->fetch(PDO::FETCH_BOTH)) {
		$bldgid = $data[0];
		$marketfacilityid = $data[1];
		$marketfacilityname = $data[2];
		$bldgname = $data[3];
	}

	$strAddSection = $conn->prepare("
		INSERT INTO
			tbl_section
		VALUES (
			NULL,
			'".$_POST["txtAddSectionName"]."',
			'".$marketfacilityid."',
			'".$bldgid."'
		);
	");

	echo ($strAddSection->execute());
?>