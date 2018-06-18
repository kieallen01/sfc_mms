<?php
	include ("../includes/connection.php");

	header ("Content-Type: application/json");
	if ($_GET["q"] == "all") {
		$strGetAFs = "
			SELECT
				tbl_af.fld_af_id,
				tbl_af.fld_af_desc
			FROM
				tbl_af;
		";
		$cmdGetAFs = $conn->query($strGetAFs);
		$arrayGetAFs = [];
		while ($data=$cmdGetAFs->fetch(PDO::FETCH_BOTH)) {
			$AFid = $data[0];
			$AFdesc = $data[1];
			$rows = [
				"AFid"		=>	$AFid,
				"AFdesc"	=>	$AFdesc
			];
			array_push($arrayGetAFs,$rows);
		}
		echo json_encode($arrayGetAFs);
	}
	else if ($_GET["q"] == "search") {
		$strGetAFs = "
			SELECT
				tbl_af.fld_af_id,
				tbl_af.fld_af_desc
			FROM
				tbl_af
			WHERE
				tbl_af.fld_af_id = '".$_POST["AFid"]."';
		";
		$cmdGetAFs = $conn->query($strGetAFs);
		$arrayGetAFs = [];
		while ($data=$cmdGetAFs->fetch(PDO::FETCH_BOTH)) {
			$AFid = $data[0];
			$AFdesc = $data[1];
			$rows = [
				"AFid"		=>	$AFid,
				"AFdesc"	=>	$AFdesc
			];
			array_push($arrayGetAFs,$rows);
		}
		echo json_encode($arrayGetAFs);
	}
?>