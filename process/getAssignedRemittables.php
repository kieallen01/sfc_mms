<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	$strGetAssignedRemittables = "
		SELECT
			tbl_assigned_remittable.fld_assigned_remittable_id,
			
			tbl_assigned_remittable.fld_user_username,
			tbl_user.fld_user_fname,
			tbl_user.fld_user_mname,
			tbl_user.fld_user_lname,
			
			tbl_assigned_remittable.fld_remittable_id,
			tbl_remittable.fld_remittable_desc,
			
			tbl_assigned_remittable.fld_assigned_remittable_from,
			tbl_assigned_remittable.fld_assigned_remittable_to,
			
			tbl_assigned_remittable.fld_assigned_remittable_date
		FROM
			tbl_assigned_remittable
				INNER JOIN
					tbl_user ON tbl_assigned_remittable.fld_user_username = tbl_user.fld_user_username
				INNER JOIN
					tbl_remittable ON tbl_assigned_remittable.fld_remittable_id = tbl_remittable.fld_remittable_id
		WHERE
			tbl_assigned_remittable.fld_user_username = '".$_POST["collector"]."';
	";
	$cmdGetAssignedRemittables = $conn->query($strGetAssignedRemittables);
	$arrayGetAssignedRemittables = [];
	while ($data=$cmdGetAssignedRemittables->fetch(PDO::FETCH_BOTH)) {
		$assignid 		= $data[0];
		$userusername 	= $data[1];
		$userfname 		= $data[2];
		$usermname 		= $data[3];
		$userlname 		= $data[4];
		$remittableid 	= $data[5];
		$remittabledesc = $data[6];
		$remittablefrom = $data[7];
		$remittableto	= $data[8];
		$remittabledate = $data[9];
		$rows = [
			"assignid"			=>	$assignid,
			"userusername"		=>	$userusername,
			"userfname"			=>	$userfname,
			"usermname"			=>	$usermname,
			"userlname"			=>	$userlname,
			"remittableid"		=>	$remittableid,
			"remittabledesc"	=>	$remittabledesc,
			"remittablefrom"	=>	$remittablefrom,
			"remittableto"		=>	$remittableto,
			"remittabledate"	=>	$remittabledate
		];
		array_push($arrayGetAssignedRemittables, $rows);
	}
	echo json_encode($arrayGetAssignedRemittables);
?>