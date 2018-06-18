<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "dept") {
		$strGetDepartments = "SELECT * from tbl_department order by fld_department_desc;";
		$cmdGetDepartments = $conn->query($strGetDepartments);
		$arrayGetDepartments = [];
		while ($data=$cmdGetDepartments->fetch(PDO::FETCH_BOTH)) {
			$departmentid = $data[0];
			$departmentdesc = $data[1];
			$rows = [
				"departmentid"		=>	$departmentid,
				"departmentdesc"	=>	$departmentdesc
			];
			array_push($arrayGetDepartments, $rows);
		}
		echo json_encode($arrayGetDepartments);
	}
	else if ($_GET["q"] == "level") {
		$strGetUserLevels = "SELECT * FROM tbl_userlevel ORDER BY fld_userlevel_desc;";
		$cmdGetUserLevels = $conn->query($strGetUserLevels);
		$arrayGetUserLevels = [];
		while ($data=$cmdGetUserLevels->fetch(PDO::FETCH_BOTH)) {
			$userlevelid = $data[0];
			$userleveldesc = $data[1];
			$rows = [
				"userlevelid"	=>$userlevelid,
				"userleveldesc"	=>$userleveldesc
			];
			array_push ($arrayGetUserLevels, $rows);
		}
		echo json_encode($arrayGetUserLevels);
	}
?>