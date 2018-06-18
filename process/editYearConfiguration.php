<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "change_status") {
		if ($_GET["to"] == "active") {
			$strChangeAllYearConfigurationStatusToInactive = $conn->prepare("
				UPDATE
					tbl_yearconf
				SET
					tbl_yearconf.fld_yearconf_status = 'Inactive';
			");
			$strChangeYearConfigurationStatus = $conn->prepare("
				UPDATE
					tbl_yearconf
				SET
					tbl_yearconf.fld_yearconf_status = 'Active'
				WHERE
					tbl_yearconf.fld_yearconf_year = '".$_POST["yearconfyear"]."';
			");

			if ($strChangeAllYearConfigurationStatusToInactive->execute()) {
				echo ($strChangeYearConfigurationStatus->execute());
			}
			else {
				echo false;
			}
		}
		else if ($_GET["to"] == "inactive") {
			$strChangeAllYearConfigurationStatusToInactive = $conn->prepare("
				UPDATE
					tbl_yearconf
				SET
					tbl_yearconf.fld_yearconf_status = 'Inactive';
			");
			$strChangeYearConfigurationStatus = $conn->prepare("
				UPDATE
					tbl_yearconf
				SET
					tbl_yearconf.fld_yearconf_status = 'Inactive'
				WHERE
					tbl_yearconf.fld_yearconf_year = '".$_POST["yearconfyear"]."';
			");

			if ($strChangeAllYearConfigurationStatusToInactive->execute()) {
				echo ($strChangeYearConfigurationStatus->execute());
			}
			else {
				echo false;
			}
		}
	}
?>