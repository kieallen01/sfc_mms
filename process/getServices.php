<?php
	include ("../includes/connection.php");

	header ("Content-Type: application/json");
	if ($_GET["q"] == "all") {
		$strGetServices = "
			SELECT
				tbl_service.fld_service_id,
				tbl_service.fld_service_type,
				tbl_service.fld_service_feetype,
				tbl_service.fld_service_desc,
				tbl_service.fld_service_value
			FROM
				tbl_service;
		";
		$cmdGetServices = $conn->query($strGetServices);
		$arrayGetServices = [];
		while($data=$cmdGetServices->fetch(PDO::FETCH_BOTH)) {
			$serviceid 		= $data[0];
			$servicetype 	= $data[1];
			$servicefeetype = $data[2];
			$servicedesc 	= $data[3];
			$servicevalue 	= $data[4];
			$rows = [
				"serviceid"			=>$serviceid,
				"servicetype"		=>$servicetype,
				"servicefeetype"	=>$servicefeetype,
				"servicedesc"		=>$servicedesc,
				"servicevalue"		=>$servicevalue
			];
			array_push($arrayGetServices,$rows);
		}
		echo json_encode($arrayGetServices);
	}
	else if ($_GET["q"] == "search") {
		$strGetServices = "
			SELECT
				tbl_service.fld_service_id,
				tbl_service.fld_service_type,
				tbl_service.fld_service_feetype,
				tbl_service.fld_service_desc,
				tbl_service.fld_service_value
			FROM
				tbl_service
			WHERE
				tbl_service.fld_service_id = '".$_POST["serviceid"]."';
		";
		$cmdGetServices = $conn->query($strGetServices);
		$arrayGetServices = [];
		while($data=$cmdGetServices->fetch(PDO::FETCH_BOTH)) {
			$serviceid 		= $data[0];
			$servicetype 	= $data[1];
			$servicefeetype = $data[2];
			$servicedesc 	= $data[3];
			$servicevalue 	= $data[4];
			$rows = [
				"serviceid"			=>$serviceid,
				"servicetype"		=>$servicetype,
				"servicefeetype"	=>$servicefeetype,
				"servicedesc"		=>$servicedesc,
				"servicevalue"		=>$servicevalue
			];
			array_push($arrayGetServices,$rows);
		}
		echo json_encode($arrayGetServices);
	}
?>