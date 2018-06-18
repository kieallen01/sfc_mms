<?php
	include ("../includes/connection.php");

	$strGetSignatories = "
		SELECT
			tbl_signatory.fld_signatory_id,
			tbl_signatory.fld_signatory_name,
			tbl_signatory.fld_signatory_position
		FROM
			tbl_signatory;
	";
	$cmdGetSignatories = $conn->query($strGetSignatories);
	$arrayGetSignatories = [];
	while ($data=$cmdGetSignatories->fetch(PDO::FETCH_BOTH)) {
		$signatoryid = $data[0];
		$signatoryname = $data[1];
		$signatoryposition = $data[2];
		$rows = [
			"signatoryid"		=>	$signatoryid,
			"signatoryname"		=>	$signatoryname,
			"signatoryposition"	=>	$signatoryposition
		];
		array_push($arrayGetSignatories,$rows);
	}
	echo json_encode($arrayGetSignatories);
?>