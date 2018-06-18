<?php
	session_start();
	include ("../includes/connection.php");

	if (isset($_SESSION["userusername"]) && ($_SESSION["userusername"]==$_POST["userusername"])) {
		echo false;
	}
	else {
		$strDeleteUser = $conn->prepare("
			DELETE FROM
				tbl_user
			WHERE
				fld_user_username = '".$_POST["userusername"]."';
		");

		echo ($strDeleteUser->execute());
	}
?>