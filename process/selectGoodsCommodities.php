<?php
	include ("../includes/connection.php");

	$strSelectGoodsCommodities = "
		SELECT
			tbl_goodscommodities.fld_businesstype_id,
			tbl_businesstype.fld_businesstype_desc,

			tbl_goodscommodities.fld_goodscommodities_id,
			tbl_goodscommodities.fld_goodscommodities_desc
		FROM
			tbl_goodscommodities
				INNER JOIN tbl_businesstype ON tbl_goodscommodities.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
		WHERE
			tbl_goodscommodities.fld_goodscommodities_id = '".$_POST["GCid"]."';
	";
	$cmdSelectGoodsCommodities = $conn->query($strSelectGoodsCommodities);
	$arraySelectGoodsCommodities = [];
	while ($data=$cmdSelectGoodsCommodities->fetch(PDO::FETCH_BOTH)) {
		$BTid 	= $data[0];
		$BTdesc = $data[1];
		$GCid 	= $data[2];
		$GCdesc = $data[3];
		$row = [
			"BTid"		=>	$BTid,
			"BTdesc"	=>	$BTdesc,
			"GCid"		=>	$GCid,
			"GCdesc"	=>	$GCdesc
		];
		array_push($arraySelectGoodsCommodities,$row);
	}
	echo json_encode($arraySelectGoodsCommodities);
?>