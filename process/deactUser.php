<?php
	session_start();
	include ("../includes/connection.php");

	if (isset($_SESSION["userusername"]) && ($_SESSION["userusername"]==$_POST["userusername"])) {
		echo false;
	}
	else {
		$strDeactUser = $conn->prepare("
			UPDATE
				tbl_user
			SET
				fld_user_status_id = '0'
			WHERE
				fld_user_username = '".$_POST["userusername"]."';
		");

		echo ($strDeactUser->execute());
	}
?>