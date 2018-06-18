<?php
	include ("../includes/connection.php");

	$strGetHistoryLogs = "
		SELECT
			tbl_historylog.fld_historylog_id,
			tbl_historylog.fld_historylog_desc,
			tbl_historylog.fld_historylog_date,

			tbl_historylog.fld_user_username,
			tbl_user.fld_user_level,
			tbl_user.fld_user_status,
			tbl_user.fld_user_department
			
		FROM
			tbl_historylog
				INNER JOIN tbl_user ON tbl_historylog.fld_user_username = tbl_user.fld_user_username;
	";
	$cmdGetHistoryLogs = $conn->query($strGetHistoryLogs);
	$arrayGetHistoryLogs = [];
	while ($data=$cmdGetHistoryLogs->fetch(PDO::FETCH_BOTH)) {
		$historylogid 		= $data[0];
		$historylogdesc 	= $data[1];
		$historylogdate 	= $data[2];
		$userusername 		= $data[3];
		$userlevel 			= $data[4];
		$userstatus 		= $data[5];
		$userdepartment 	= $data[6];
		$rows = [
			"historylogid"		=>	$historylogid,
			"historylogdesc"	=>	$historylogdesc,
			"historylogdate"	=>	$historylogdate,
			"userusername"		=>	$userusername,
			"userlevel"			=>	$userlevel,
			"userstatus"		=>	$userstatus,
			"userdepartment"	=>	$userdepartment
		];
		array_push($arrayGetHistoryLogs,$rows);
	}
	echo json_encode($arrayGetHistoryLogs);
?>