<?php
	include('../includes/connection.php');

	$strGetApplicationCount = "
		SELECT
			max(fld_stall_application_id)
		FROM 
			tbl_stall_application
	";

	$cmdGetApplicationCount = $conn->query($strGetApplicationCount);
	$arrayGetApplicationCount = [];

	while ($data=$cmdGetApplicationCount->fetch(PDO::FETCH_BOTH)) {
		$id = $data[0];
		$rows = [
			'id'	=>	$id
		];
		array_push($arrayGetApplicationCount, $rows);
	}
	echo json_encode($arrayGetApplicationCount);
?>