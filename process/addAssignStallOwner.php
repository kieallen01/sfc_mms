<?php
	include("../includes/connection.php");

	$stalls = $_POST['stalls'];

	foreach ($stalls as $stall) {
		$strAddAssignStallOwner = $conn->prepare("
			UPDATE
				tbl_stall
			SET
				fld_stall_application_id = '".$_POST['txtHiddenApplicationId']."'
			WHERE
				fld_stall_number = $stall

		");
		if ($strAddAssignStallOwner->execute()) {
			$date = new DateTime($_POST['txtAssignAStallEffectivityDate']);
			$effdate = $date->format('Y-m-d');
			$strUpdatStatus = $conn->prepare("
				UPDATE
					tbl_stall_application
				SET
					fld_stall_application_status = '2',
					fld_stall_application_effectivity = '".$effdate."',
					fld_stall_application_notes = '".$_POST["txtAssignAStallNotes"]."'
				WHERE
					fld_stall_application_id = '".$_POST['txtHiddenApplicationId']."'
					");
			echo ($strUpdatStatus->execute());
		}else{
			echo false;
		}
	}

?>