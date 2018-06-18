<?php
	session_start();
	include ("../includes/connection.php");

	//sha1(md5(md5(sha1())))
	header ("Content-type: application/json");
	$strLogin = "
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
			tbl_user.fld_user_username = '".$_POST["txtUser"]."' AND DES_DECRYPT(tbl_user.fld_user_password) = '".sha1(md5(md5(sha1($_POST["txtPass"]))))."' AND tbl_user.fld_user_status = 'Active';
	";
	$cmdLogin = $conn->query($strLogin);
	$arrayLogin = [];
	while ($data=$cmdLogin->fetch(PDO::FETCH_BOTH)) {
		$userusername					=	$data[0];
		$userfname						=	$data[1];
		$usermname						=	$data[2];
		$userlname						=	$data[3];
		$userlevel						=	$data[4];
		$userstatus						=	$data[5];
		$userdepartment					=	$data[6];

		$_SESSION["started"] = true;
		$_SESSION["userusername"] 		=	$userusername;
		$_SESSION["userfname"] 			=	$userfname;
		$_SESSION["usermname"] 			=	$usermname;
		$_SESSION["userlname"] 			=	$userlname;
		$_SESSION["userlevel"] 			=	$userlevel;
		$_SESSION["userstatus"] 		=	$userstatus;
		$_SESSION["userdepartment"] 	=	$userdepartment;

		$rows = [
			"userusername"				=>	$_SESSION["userusername"],
			"userfname"					=>	$_SESSION["userfname"],
			"usermname"					=>	$_SESSION["usermname"],
			"userlname"					=>	$_SESSION["userlname"],
			"userlevel"					=>	$_SESSION["userlevel"],
			"userstatus"				=>	$_SESSION["userstatus"],
			"userdepartment"			=>	$_SESSION["userdepartment"]
		];
		array_push($arrayLogin, $rows);
	}
	echo json_encode($arrayLogin);
?>