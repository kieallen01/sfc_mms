<?php
	include ("../includes/connection.php");

	$strSelectSignatory = "
		SELECT
			tbl_signatory.fld_signatory_id,
			tbl_signatory.fld_signatory_name,
			tbl_signatory.fld_signatory_position
		FROM
			tbl_signatory
		WHERE
			tbl_signatory.fld_signatory_id = '".$_POST["signatoryid"]."';
	";
	$cmdSelectSignatory = $conn->query($strSelectSignatory);
	$arraySelectSignatory = [];
	while ($data=$cmdSelectSignatory->fetch(PDO::FETCH_BOTH)) {
		$signatoryid = $data[0];
		$signatoryname = $data[1];
		$signatoryposition = $data[2];
		$rows = [
			"signatoryid"		=>	$signatoryid,
			"signatoryname"		=>	$signatoryname,
			"signatoryposition"	=>	$signatoryposition
		];
		array_push($arraySelectSignatory,$rows);
	}
	echo json_encode($arraySelectSignatory);
?>