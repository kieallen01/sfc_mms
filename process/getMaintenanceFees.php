<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "all") {
		$strGetMaintenanceFees = "
			SELECT
				tbl_maintenancefee.fld_maintenancefee_id,
				tbl_maintenancefee.fld_maintenancefee_fee,

				tbl_maintenancefee.fld_businesstype_id,
				tbl_businesstype.fld_businesstype_desc
			FROM
				tbl_maintenancefee
					INNER JOIN
						tbl_businesstype ON tbl_maintenancefee.fld_businesstype_id = tbl_businesstype.fld_businesstype_id;
		";
		$cmdGetMaintenanceFees = $conn->query($strGetMaintenanceFees);
		$arrayGetMaintenanceFees = [];
		while($data=$cmdGetMaintenanceFees->fetch(PDO::FETCH_BOTH)) {
			$maintenancefeeid 	= $data[0];
			$maintenancefeefee 	= $data[1];
			$BTid 				= $data[2];
			$BTdesc 			= $data[3];

			$rows = [
				"maintenancefeeid"	=>$maintenancefeeid,
				"maintenancefeefee"	=>$maintenancefeefee,
				"BTid"				=>$BTid,
				"BTdesc"			=>$BTdesc
			];

			array_push($arrayGetMaintenanceFees, $rows);
		}
		echo json_encode($arrayGetMaintenanceFees);
	}
	else if ($_GET["q"] == "search") {
		$strGetMaintenanceFee = "
			SELECT
				tbl_maintenancefee.fld_maintenancefee_id,
				tbl_maintenancefee.fld_maintenancefee_fee,

				tbl_maintenancefee.fld_businesstype_id,
				tbl_businesstype.fld_businesstype_desc
			FROM
				tbl_maintenancefee
					INNER JOIN
						tbl_businesstype ON tbl_maintenancefee.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
			WHERE
				tbl_maintenancefee.fld_maintenancefee_id = '".$_POST["maintenancefeeid"]."';
		";
		$cmdGetMaintenanceFee = $conn->query($strGetMaintenanceFee);
		$arrayGetMaintenanceFee = [];
		while($data=$cmdGetMaintenanceFee->fetch(PDO::FETCH_BOTH)) {
			$maintenancefeeid 	= $data[0];
			$maintenancefeefee 	= $data[1];
			$BTid 				= $data[2];
			$BTdesc 			= $data[3];

			$row = [
				"maintenancefeeid"	=>$maintenancefeeid,
				"maintenancefeefee"	=>$maintenancefeefee,
				"BTid"				=>$BTid,
				"BTdesc"			=>$BTdesc
			];

			array_push($arrayGetMaintenanceFee, $row);
		}
		echo json_encode($arrayGetMaintenanceFee);
	}

	header("Content-Type: application/json");
?>