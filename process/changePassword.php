<?php
	include ("../includes/connection.php");
	session_start();

	$strChangePassword = $conn->prepare("
		UPDATE
			tbl_admin
		SET
			tbl_admin.fld_admin_password = DES_ENCRYPT('".sha1(md5(md5(sha1($_POST["txtChangePasswordNewPassword"]))))."')
		WHERE
			tbl_admin.fld_admin_username = '".$_SESSION["adminusername"]."' AND DES_DECRYPT(tbl_admin.fld_admin_password) = '".sha1(md5(md5(sha1($_POST["txtChangePasswordCurrentPassword"]))))."';
	");

	echo ($strChangePassword->execute());
?>