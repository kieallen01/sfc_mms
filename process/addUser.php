<?php
	include ("../includes/connection.php");

	$strAddUser = $conn->prepare("
		INSERT INTO
			tbl_user
		VALUES (
			'".$_POST["txtAddUserUsername"]."',
			DES_ENCRYPT('".sha1(md5(md5(sha1($_POST["txtAddUserPassword"]))))."'),
			'".ucwords($_POST["txtAddUserFName"])."',
			'".ucwords($_POST["txtAddUserMName"])."',
			'".ucwords($_POST["txtAddUserLName"])."',
			'".$_POST["cmbAddUserUserLevel"]."',
			'Active',
			'".$_POST["cmbAddUserDepartment"]."'
		);
	");
	
	echo ($strAddUser->execute());
?>