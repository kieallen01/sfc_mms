<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "all") {
		$strGetOtherFees = "
			SELECT
				tbl_otherfee.fld_otherfee_id,
				tbl_otherfee.fld_otherfee_desc,
				tbl_otherfee.fld_otherfee_value
			FROM
				tbl_otherfee;
		";
		$cmdGetOtherFees = $conn->query($strGetOtherFees);
		$arrayGetOtherFees = [];
		while ($data=$cmdGetOtherFees->fetch(PDO::FETCH_BOTH)) {
			$otherfeeid = $data[0];
			$otherfeedesc = $data[1];
			$otherfeevalue = $data[2];

			$rows = [
				"otherfeeid"	=>	$otherfeeid,
				"otherfeedesc"	=>	$otherfeedesc,
				"otherfeevalue"	=>	$otherfeevalue
			];

			array_push($arrayGetOtherFees,$rows);
		}
		echo json_encode($arrayGetOtherFees);
	}
	else if ($_GET["q"] == "search") {
		$strGetOtherFees = "
			SELECT
				tbl_otherfee.fld_otherfee_id,
				tbl_otherfee.fld_otherfee_desc,
				tbl_otherfee.fld_otherfee_value
			FROM
				tbl_otherfee
			WHERE
				tbl_otherfee.fld_otherfee_id = '".$_POST["otherfeeid"]."';
		";
		$cmdGetOtherFees = $conn->query($strGetOtherFees);
		$arrayGetOtherFees = [];
		while ($data=$cmdGetOtherFees->fetch(PDO::FETCH_BOTH)) {
			$otherfeeid = $data[0];
			$otherfeedesc = $data[1];
			$otherfeevalue = $data[2];

			$rows = [
				"otherfeeid"	=>	$otherfeeid,
				"otherfeedesc"	=>	$otherfeedesc,
				"otherfeevalue"	=>	$otherfeevalue
			];

			array_push($arrayGetOtherFees,$rows);
		}
		echo json_encode($arrayGetOtherFees);
	}
?>