<?php
	include('../../includes/connection.php');
	$strGetGoods = "
		SELECT 
			tbl_goodscommodities.fld_goodscommodities_id,
			tbl_goodscommodities.fld_goodscommodities_desc
		FROM
			tbl_goodscommodities
		WHERE
			fld_businesstype_id = '".$_POST['id']."'";

	$cmdGetGoods = $conn->query($strGetGoods);
	$arrayGetGoods = [];
	while ($data=$cmdGetGoods->fetch(PDO::FETCH_BOTH)) {
		$goodsid = $data[0];
		$goodsdesc = $data[1];

		$rows = [
			'goodsid'   => $goodsid,
			'goodsdesc' => $goodsdesc
		];

		array_push($arrayGetGoods, $rows);
	}

	echo json_encode($arrayGetGoods);
?>