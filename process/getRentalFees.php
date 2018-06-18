<?php
	include ("../includes/connection.php");

	$strGetRentalFees = "
		SELECT
			tbl_rentalfee.fld_rentalfee_type,
			tbl_rentalfee.fld_rentalfee_fee,

			tbl_rentalfee.fld_area_id,
			tbl_area.fld_area_desc,
			tbl_area.fld_area_size,
			tbl_area.fld_area_sizeunit
		FROM
			tbl_rentalfee
				INNER JOIN
					tbl_area ON tbl_rentalfee.fld_area_id = tbl_area.fld_area_id
	";

	if ($_GET["q"] == "all") {
		$cmdGetRentalFees = $conn->query($strGetRentalFees);
		$arrayGetRentalFees = [];
		while ($data=$cmdGetRentalFees->fetch(PDO::FETCH_BOTH)) {
			$rentalfeetype 		= $data[0];
			$rentalfeefee 		= $data[1];
			$areaid 			= $data[2];
			$areadesc 			= $data[3];
			$areasize 			= $data[4];
			$areasizeunit 		= $data[5];
			$rows = [
				"rentalfeetype"	=>	$rentalfeetype,
				"rentalfeefee"	=>	$rentalfeefee,
				"areaid"		=>	$areaid,
				"areadesc"		=>	$areadesc,
				"areasize"		=>	$areasize,
				"areasizeunit"	=>	$areasizeunit
			];
			array_push($arrayGetRentalFees,$rows);
		}
		echo json_encode($arrayGetRentalFees);
	}
	else if ($_GET["q"] == "search") {
		$cmdGetRentalFee = $conn->query($strGetRentalFees."WHERE tbl_rentalfee.fld_area_id = '".$_POST["areaid"]."'");
		$arrayGetRentalFee = [];
		while ($data=$cmdGetRentalFee->fetch(PDO::FETCH_BOTH)) {
			$rentalfeetype 		= $data[0];
			$rentalfeefee 		= $data[1];
			$areaid 			= $data[2];
			$areadesc 			= $data[3];
			$areasize 			= $data[4];
			$areasizeunit 		= $data[5];
			$row = [
				"rentalfeetype"	=>	$rentalfeetype,
				"rentalfeefee"	=>	$rentalfeefee,
				"areaid"		=>	$areaid,
				"areadesc"		=>	$areadesc,
				"areasize"		=>	$areasize,
				"areasizeunit"	=>	$areasizeunit
			];
			array_push($arrayGetRentalFee,$row);
		}
		echo json_encode($arrayGetRentalFee);
	}
?>