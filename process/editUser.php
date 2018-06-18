<?php
	include ("../includes/connection.php");

	//'".$_POST[""]."'
	$strEditUser = $conn->prepare("
		UPDATE tbl_user 
		SET 
			fld_user_username = '".$_POST["txtEditUserUsername"]."',
			fld_user_fname = '".ucwords($_POST["txtEditUserFName"])."',
			fld_user_mname = '".ucwords($_POST["txtEditUserMName"])."',
			fld_user_lname = '".ucwords($_POST["txtEditUserLName"])."',
			fld_user_level = '".$_POST["cmbEditUserUserLevel"]."',
			fld_user_department = '".$_POST["cmbEditUserDepartment"]."'
		WHERE fld_user_username = '".$_POST["txthiddenEditUserUsername"]."';
	");
	echo ($strEditUser->execute());
?>