<?php
	include ("../includes/connection.php");

	header ("Content-type: application/json");
	if ($_GET["q"] == "all" && $_GET["type"] == "all") {
		$strGetUsers = "
			SELECT 
				tbl_user.fld_user_username,
				tbl_user.fld_user_fname,
				tbl_user.fld_user_mname,
				tbl_user.fld_user_lname,
				tbl_user.fld_user_level,
				tbl_user.fld_user_status,
				tbl_user.fld_user_department
			FROM
				tbl_user;
		";
		$cmdGetUsers = $conn->query($strGetUsers);
		$arrayGetUsers = [];
		while($data=$cmdGetUsers->fetch(PDO::FETCH_BOTH)) {
			$userusername		= $data[0];
			$userfname			= $data[1];
			$usermname			= $data[2];
			$userlname			= $data[3];
			$userlevel			= $data[4];
			$userstatus			= $data[5];
			$userdepartment		= $data[6];
			$rows = [
				"userusername"		=>	$userusername,
				"userfname"			=>	$userfname,
				"usermname"			=>	$usermname,
				"userlname"			=>	$userlname,
				"userlevel"			=>	$userlevel,
				"userstatus"		=>	$userstatus,
				"userdepartment"	=>	$userdepartment
			];
			array_push($arrayGetUsers, $rows);
		}
		echo json_encode($arrayGetUsers);
	}
	else if ($_GET["q"] == "search") {
		$strSelectUser = "
			SELECT 
				tbl_user.fld_user_username,
				tbl_user.fld_user_fname,
				tbl_user.fld_user_mname,
				tbl_user.fld_user_lname,
				tbl_user.fld_user_level,
				tbl_user.fld_user_status,
				tbl_user.fld_user_department
			FROM
				tbl_user
			WHERE 
				tbl_user.fld_user_username = '".$_POST["userusername"]."';
		";
		$cmdSelectUser = $conn->query($strSelectUser);
		$arraySelectUser = [];
		while ($data=$cmdSelectUser->fetch(PDO::FETCH_BOTH)) {
			$userusername		= $data[0];
			$userfname			= $data[1];
			$usermname			= $data[2];
			$userlname			= $data[3];
			$userlevel			= $data[4];
			$userstatus			= $data[5];
			$userdepartment		= $data[6];
			$row = [
				"userusername"		=>	$userusername,
				"userfname"			=>	$userfname,
				"usermname"			=>	$usermname,
				"userlname"			=>	$userlname,
				"userlevel"			=>	$userlevel,
				"userstatus"		=>	$userstatus,
				"userdepartment"	=>	$userdepartment
			];
			array_push ($arraySelectUser,$row);
		}
		echo json_encode($arraySelectUser);
	}
	else if ( $_GET["q"] == "all" && $_GET["type"] == "Collector" ) {
		$strSelectUser = "
			SELECT 
				tbl_user.fld_user_username,
				tbl_user.fld_user_fname,
				tbl_user.fld_user_mname,
				tbl_user.fld_user_lname,
				tbl_user.fld_user_level,
				tbl_user.fld_user_status,
				tbl_user.fld_user_department
			FROM
				tbl_user
			WHERE 
				tbl_user.fld_user_level = 'Collector';
		";
		$cmdSelectUser = $conn->query($strSelectUser);
		$arraySelectUser = [];
		while ($data=$cmdSelectUser->fetch(PDO::FETCH_BOTH)) {
			$userusername		= $data[0];
			$userfname			= $data[1];
			$usermname			= $data[2];
			$userlname			= $data[3];
			$userlevel			= $data[4];
			$userstatus			= $data[5];
			$userdepartment		= $data[6];
			$row = [
				"userusername"		=>	$userusername,
				"userfname"			=>	$userfname,
				"usermname"			=>	$usermname,
				"userlname"			=>	$userlname,
				"userlevel"			=>	$userlevel,
				"userstatus"		=>	$userstatus,
				"userdepartment"	=>	$userdepartment
			];
			array_push ($arraySelectUser,$row);
		}
		echo json_encode($arraySelectUser);
	}
?>