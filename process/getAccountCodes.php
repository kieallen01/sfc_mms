<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "all") {
		$strGetAccountCodes = "
			SELECT
				tbl_accountcode.fld_accountcode_code,
				tbl_accountcode.fld_accountcode_desc
			FROM
				tbl_accountcode
			ORDER BY
				tbl_accountcode.fld_accountcode_desc;
		";
		$cmdGetAccountCodes = $conn->query($strGetAccountCodes);
		$arrayGetAccountCodes = [];
		while ($data=$cmdGetAccountCodes->fetch(PDO::FETCH_BOTH)) {
			$accountcodecode = $data[0];
			$accountcodedesc = $data[1];
			$rows = [
				"accountcodecode"	=>	$accountcodecode,
				"accountcodedesc"	=>	$accountcodedesc
			];
			array_push($arrayGetAccountCodes,$rows);
		}
		echo json_encode($arrayGetAccountCodes);
	}
	else if ($_GET["q"] == "search") {
		$strSelectAccountCode = "
			SELECT
				tbl_accountcode.fld_accountcode_code,
				tbl_accountcode.fld_accountcode_desc
			FROM
				tbl_accountcode
			WHERE
				tbl_accountcode.fld_accountcode_code = '".$_POST["accountcodecode"]."';
		";
		$cmdSelectAccountCode = $conn->query($strSelectAccountCode);
		$arraySelectAccountCode = [];
		while ($data=$cmdSelectAccountCode->fetch(PDO::FETCH_BOTH)) {
			$accountcodecode = $data[0];
			$accountcodedesc = $data[1];
			$rows = [
				"accountcodecode"	=>	$accountcodecode,
				"accountcodedesc"	=>	$accountcodedesc
			];
			array_push($arraySelectAccountCode,$rows);
		}
		echo json_encode($arraySelectAccountCode);
	}

	header("Content-Type: application/json");
?>