<?php
	include ("../includes/connection.php");

	if ($_GET["q"] == "all") {
		$strGetGoodsCommodities = "
			SELECT
				tbl_goodscommodities.fld_businesstype_id,
				tbl_businesstype.fld_businesstype_desc,

				tbl_goodscommodities.fld_goodscommodities_id,
				tbl_goodscommodities.fld_goodscommodities_desc
			FROM
				tbl_goodscommodities
					INNER JOIN tbl_businesstype ON tbl_goodscommodities.fld_businesstype_id = tbl_businesstype.fld_businesstype_id;
		";
		$cmdGetGoodsCommodities = $conn->query($strGetGoodsCommodities);
		$arrayGetGoodsCommodities = [];
		while ($data=$cmdGetGoodsCommodities->fetch(PDO::FETCH_BOTH)) {
			$BTid = $data[0];
			$BTdesc = $data[1];
			$GCid = $data[2];
			$GCdesc = $data[3];
			$rows = [
				"BTid"=>$BTid,
				"BTdesc"=>$BTdesc,
				"GCid"=>$GCid,
				"GCdesc"=>$GCdesc
			];
			array_push($arrayGetGoodsCommodities,$rows);
		}
		// WHAT?!
		// $cmdGetGoodsCommodities = $conn->prepare($strGetGoodsCommodities);
		// $cmdGetGoodsCommodities->execute();
		// $arrayGetGoodsCommodities = $cmdGetGoodsCommodities->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($arrayGetGoodsCommodities);
	}
	else if ($_GET["q"] == "search") {
		$strGetGoodsCommodities = "
			SELECT
				tbl_goodscommodities.fld_businesstype_id,
				tbl_businesstype.fld_businesstype_desc,

				tbl_goodscommodities.fld_goodscommodities_id,
				tbl_goodscommodities.fld_goodscommodities_desc
			FROM
				tbl_goodscommodities
					INNER JOIN tbl_businesstype ON tbl_goodscommodities.fld_businesstype_id = tbl_businesstype.fld_businesstype_id
			WHERE
				tbl_goodscommodities.fld_businesstype_id = '".$_POST["BTid"]."';
		";
		$cmdGetGoodsCommodities = $conn->query($strGetGoodsCommodities);
		$arrayGetGoodsCommodities = [];
		while ($data=$cmdGetGoodsCommodities->fetch(PDO::FETCH_BOTH)) {
			$BTid = $data[0];
			$BTdesc = $data[1];
			$GCid = $data[2];
			$GCdesc = $data[3];
			$rows = [
				"BTid"=>$BTid,
				"BTdesc"=>$BTdesc,
				"GCid"=>$GCid,
				"GCdesc"=>$GCdesc
			];
			array_push($arrayGetGoodsCommodities,$rows);
		}
		echo json_encode($arrayGetGoodsCommodities);
	}
?>