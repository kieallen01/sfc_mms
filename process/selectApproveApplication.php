<?php
	include("../includes/connection.php");

	$strGetPendingApplications = "
		SELECT
			tbl_stall_applicant.fld_stall_application_id,
			tbl_stall_application.fld_stall_application_status,
			
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,

			tbl_stall_application.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc,
			tbl_stall_application.fld_stall_application_capital
		FROM
			tbl_stall_application
				INNER JOIN
					tbl_stall_applicant ON tbl_stall_application.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id
				INNER JOIN
					tbl_businesstype ON tbl_stall_application.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
		WHERE
			tbl_stall_application.fld_stall_application_id = '".$_POST['applicantid']."'
	";

	$cmdGetPendingApplications = $conn->query($strGetPendingApplications);
	$arrayGetPendingApplications = [];
	while ($data=$cmdGetPendingApplications->fetch(PDO::FETCH_BOTH)) {
		$applicationid 		= $data[0];
		$applicationstatus  = $data[1];
		$fullname			= $fullname = ucwords($data[4]).', '.ucwords($data[2]).' '.substr(ucwords($data[3]), 0,1).'.';
		$BTid 				= $data[5];
		$BTdesc 			= $data[6];
		$capital 			= $data[7];
		$rows = [
			"applicationid"		=>	$applicationid,
			"applicationstatus"	=>	$applicationstatus,
			"fullname"			=>	$fullname,
			"BTid"				=>	$BTid,
			"BTdesc"			=>	$BTdesc,
			"capital"			=> 	$capital
		];
		array_push($arrayGetPendingApplications,$rows);
	}
	echo json_encode($arrayGetPendingApplications);
?>