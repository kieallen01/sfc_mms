<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "all") {
		$strGetYearConfigurations = "
			SELECT
				tbl_yearconf.fld_yearconf_year,
				tbl_yearconf.fld_yearconf_status
			FROM
				tbl_yearconf
			ORDER BY
				tbl_yearconf.fld_yearconf_status;
		";
		$cmdGetYearConfigurations = $conn->query($strGetYearConfigurations);
		$arrayGetYearConfigurations = [];
		while ($data=$cmdGetYearConfigurations->fetch(PDO::FETCH_BOTH)) {
			$yearconfyear = $data[0];
			$yearconfstatus = $data[1];
			$rows = [
				"yearconfyear"		=>$yearconfyear,
				"yearconfstatus"	=>$yearconfstatus
			];
			array_push($arrayGetYearConfigurations,$rows);
		}
		echo json_encode($arrayGetYearConfigurations);
	}
	else if ($_GET["q"] == "search") {
		$strGetYearConfigurations = "
			SELECT
				tbl_yearconf.fld_yearconf_year,
				tbl_yearconf.fld_yearconf_status
			FROM
				tbl_yearconf
			WHERE
				tbl_yearconf.fld_yearconf_year = '".$_POST["yearconfyear"]."';
		";
		$cmdGetYearConfigurations = $conn->query($strGetYearConfigurations);
		$arrayGetYearConfigurations = [];
		while ($data=$cmdGetYearConfigurations->fetch(PDO::FETCH_BOTH)) {
			$yearconfyear = $data[0];
			$yearconfstatus = $data[1];
			$rows = [
				"yearconfyear"		=>$yearconfyear,
				"yearconfstatus"	=>$yearconfstatus
			];
			array_push($arrayGetYearConfigurations,$rows);
		}
		echo json_encode($arrayGetYearConfigurations);
	}
	else if ($_GET["q"] == "active") {
		$strGetYearConfigurations = "
			SELECT
				tbl_yearconf.fld_yearconf_year,
				tbl_yearconf.fld_yearconf_status
			FROM
				tbl_yearconf
			WHERE
				tbl_yearconf.fld_yearconf_status = 'Active';
		";
		$cmdGetYearConfigurations = $conn->query($strGetYearConfigurations);
		$arrayGetYearConfigurations = [];
		while ($data=$cmdGetYearConfigurations->fetch(PDO::FETCH_BOTH)) {
			$yearconfyear = $data[0];
			$yearconfstatus = $data[1];
			$rows = [
				"yearconfyear"		=>$yearconfyear,
				"yearconfstatus"	=>$yearconfstatus
			];
			array_push($arrayGetYearConfigurations,$rows);
		}
		echo json_encode($arrayGetYearConfigurations);
	}
?>