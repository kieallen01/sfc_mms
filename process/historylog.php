<?php
	session_start();
	include("../includes/connection.php");
	$strHistoryLog = $conn->prepare("
		INSERT INTO
			tbl_historylog (fld_historylog_id,fld_historylog_desc,fld_user_username)
		VALUES (
			NULL,
			'".$_POST["strHistoryLogDesc"]."',
			'".$_SESSION["adminusername"]."'
		);
	");
	echo $strHistoryLog->execute();
?>