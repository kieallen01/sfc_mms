<?php
	include("../includes/connection.php");

	$applicantid = $_POST['applicantid'];

	$strDeleteApplicant = $conn->prepare("DELETE FROM tbl_stall_applicant WHERE fld_stall_application_id = '".$applicantid."'");
	$strDeleteApplicantSpouse = $conn->prepare("DELETE FROM tbl_stall_applicant_spouse WHERE fld_stall_application_id = '".$applicantid."'");
	$strDeleteApplication = $conn->prepare("DELETE FROM tbl_stall_application WHERE fld_stall_application_id = '".$applicantid."'");

	if ($strDeleteApplicant->execute()) {
		if ($strDeleteApplicantSpouse->execute()) {
			if ($strDeleteApplication->execute()) {
				echo true;
			}else{
				echo false;
			}
		}else{
			echo false;
		}
	}else{
		echo false;
	}
?>