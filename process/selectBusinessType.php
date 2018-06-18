<?php
	include ("../includes/connection.php");

	$strSelectBusinessType = "
		SELECT
			tbl_businesstype.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc
		FROM
			tbl_businesstype
		WHERE
			tbl_businesstype.fld_businesstype_id = '".$_POST["BTid"]."';
	";
	$cmdSelectBusinessType = $conn->query($strSelectBusinessType);
	$arraySelectBusinessType = [];
	while ($data=$cmdSelectBusinessType->fetch(PDO::FETCH_BOTH)) {
		$businesstypeid = $data[0];
		$businesstypedesc = $data[1];
		$row = [
			"BTid"=>$businesstypeid,
			"BTdesc"=>$businesstypedesc
		];
		array_push($arraySelectBusinessType,$row);
	}
	echo json_encode($arraySelectBusinessType);
?>