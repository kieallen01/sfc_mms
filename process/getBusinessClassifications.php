<?php
	include ("../includes/connection.php");

	$strGetBusinessClassifications = "
		SELECT
			tbl_businessclassify.fld_businessclassify_id,
			tbl_businessclassify.fld_businessclassify_desc,
			tbl_businessclassify.fld_businessclassify_range_from,
			tbl_businessclassify.fld_businessclassify_range_to
		FROM
			tbl_businessclassify
		ORDER BY
			tbl_businessclassify.fld_businessclassify_desc;
	";
	$cmdGetBusinessClassifications = $conn->query($strGetBusinessClassifications);
	$arrayGetBusinessClassifications = [];
	while ($data=$cmdGetBusinessClassifications->fetch(PDO::FETCH_BOTH)) {
		$BCid = $data[0];
		$BCdesc = $data[1];
		$BCrangefrom = $data[2];
		$BCrangeto = $data[3];
		$rows = [
			"BCid"=>$BCid,
			"BCdesc"=>$BCdesc,
			"BCrangefrom"=>$BCrangefrom,
			"BCrangeto"=>$BCrangeto
		];
		array_push($arrayGetBusinessClassifications,$rows);
	}
	echo json_encode($arrayGetBusinessClassifications);
?>