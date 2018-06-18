<?php
	include ("../includes/connection.php");

	$strGetBusinessTypes = "
		SELECT
			tbl_businesstype.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc
		FROM
			tbl_businesstype
		ORDER BY
			tbl_businesstype.fld_businesstype_desc
	";
	$cmdGetBusinessTypes = $conn->query($strGetBusinessTypes);
	$arrayGetBusinessTypes = [];
	while ($data=$cmdGetBusinessTypes->fetch(PDO::FETCH_BOTH)) {
		$businesstypeid = $data[0];
		$businesstypedesc = $data[1];
		$rows = [
			"BTid"=>$businesstypeid,
			"BTdesc"=>$businesstypedesc
		];
		array_push($arrayGetBusinessTypes,$rows);
	}
	echo json_encode($arrayGetBusinessTypes);
?>