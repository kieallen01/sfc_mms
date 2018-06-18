<?php
	include ("../includes/connection.php");

	$strGetOwnershipTypes = "
		SELECT
			tbl_ownershiptype.fld_ownershiptype_id,
			tbl_ownershiptype.fld_ownershiptype_desc
		FROM
			tbl_ownershiptype;
	";
	$cmdGetOwnershipTypes = $conn->query($strGetOwnershipTypes);
	$arrayGetOwnershipTypes = [];
	while ($data=$cmdGetOwnershipTypes->fetch(PDO::FETCH_BOTH)) {
		$ownershiptypeid = $data[0];
		$ownershiptypedesc = $data[1];
		$rows = [
			"OTid"		=>	$ownershiptypeid,
			"OTdesc"	=>	$ownershiptypedesc
		];
		array_push($arrayGetOwnershipTypes,$rows);
	}
	echo json_encode($arrayGetOwnershipTypes);
?>