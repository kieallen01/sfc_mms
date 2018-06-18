<?php
	session_start();
	include ("../includes/connection.php");

	$arraySessionValues = [
		"userusername"			=>	$_SESSION["userusername"],
		"userfname"				=>	$_SESSION["userfname"],
		"usermname"				=>	$_SESSION["usermname"],
		"userlname"				=>	$_SESSION["userlname"],
		"userlevel"				=>	$_SESSION["userlevel"],
		"userstatus"			=>	$_SESSION["userstatus"],
		"userdepartment"		=>	$_SESSION["userdepartment"]
	];

	echo json_encode($arraySessionValues);
?>