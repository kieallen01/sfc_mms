<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	if ($_GET["q"] == "all") {
		$strGetRemittables = "
			SELECT
				tbl_remittable.fld_remittable_id,
				tbl_remittable.fld_remittable_type,
				tbl_remittable.fld_remittable_desc,
				tbl_remittable.fld_remittable_value
			FROM
				tbl_remittable
			WHERE
				tbl_remittable.fld_remittable_type = '".$_GET["type"]."';
		";
		$cmdGetRemittables = $conn->query($strGetRemittables);
		$arrayRemittables = [];
		while ($data=$cmdGetRemittables->fetch(PDO::FETCH_BOTH)) {
			$remittableid 		= $data[0];
			$remittabletype 	= $data[1];
			$remittabledesc 	= $data[2];
			$remittablevalue 	= $data[3];

			$rows = [
				"remittableid"		=>	$remittableid,
				"remittabletype"	=>	$remittabletype,
				"remittabledesc"	=>	$remittabledesc,
				"remittablevalue"	=>	$remittablevalue
			];

			array_push($arrayRemittables,$rows);
		}
		echo json_encode($arrayRemittables);
	}
	else if ($_GET["q"] == "search") {
		$strGetRemittable = "
			SELECT
				tbl_remittable.fld_remittable_id,
				tbl_remittable.fld_remittable_type,
				tbl_remittable.fld_remittable_desc,
				tbl_remittable.fld_remittable_value
			FROM
				tbl_remittable
			WHERE
				tbl_remittable.fld_remittable_id = '".$_POST["remittableid"]."' AND tbl_remittable.fld_remittable_type = '".$_GET["type"]."';
		";
		$cmdGetRemittable = $conn->query($strGetRemittable);
		$arrayRemittable = [];
		while ($data=$cmdGetRemittable->fetch(PDO::FETCH_BOTH)) {
			$remittableid 		= $data[0];
			$remittabletype 	= $data[1];
			$remittabledesc 	= $data[2];
			$remittablevalue 	= $data[3];

			$rows = [
				"remittableid"		=>	$remittableid,
				"remittabletype"	=>	$remittabletype,
				"remittabledesc"	=>	$remittabledesc,
				"remittablevalue"	=>	$remittablevalue
			];

			array_push($arrayRemittable,$rows);
		}
		echo json_encode($arrayRemittable);
	}
	else if ($_GET["q"] == "load_all") {
		$strGetRemittables = "
			SELECT
				tbl_remittable.fld_remittable_id,
				tbl_remittable.fld_remittable_type,
				tbl_remittable.fld_remittable_desc,
				tbl_remittable.fld_remittable_value
			FROM
				tbl_remittable;
		";
		$cmdGetRemittables = $conn->query($strGetRemittables);
		$arrayRemittables = [];
		while ($data=$cmdGetRemittables->fetch(PDO::FETCH_BOTH)) {
			$remittableid 		= $data[0];
			$remittabletype 	= $data[1];
			$remittabledesc 	= $data[2];
			$remittablevalue 	= $data[3];

			$rows = [
				"remittableid"		=>	$remittableid,
				"remittabletype"	=>	$remittabletype,
				"remittabledesc"	=>	$remittabledesc,
				"remittablevalue"	=>	$remittablevalue
			];

			array_push($arrayRemittables,$rows);
		}
		echo json_encode($arrayRemittables);
	}
	else if ($_GET["q"] == "search_all") {
		$strGetRemittable = "
			SELECT
				tbl_remittable.fld_remittable_id,
				tbl_remittable.fld_remittable_type,
				tbl_remittable.fld_remittable_desc,
				tbl_remittable.fld_remittable_value
			FROM
				tbl_remittable
			WHERE
				tbl_remittable.fld_remittable_id = '".$_POST["remittableid"]."';
		";
		$cmdGetRemittable = $conn->query($strGetRemittable);
		$arrayRemittable = [];
		while ($data=$cmdGetRemittable->fetch(PDO::FETCH_BOTH)) {
			$remittableid 		= $data[0];
			$remittabletype 	= $data[1];
			$remittabledesc 	= $data[2];
			$remittablevalue 	= $data[3];

			$rows = [
				"remittableid"		=>	$remittableid,
				"remittabletype"	=>	$remittabletype,
				"remittabledesc"	=>	$remittabledesc,
				"remittablevalue"	=>	$remittablevalue
			];

			array_push($arrayRemittable,$rows);
		}
		echo json_encode($arrayRemittable);
	}
?>