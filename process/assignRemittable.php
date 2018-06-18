<?php
	include ("../includes/connection.php");

	// echo json_encode(count($_POST["toassign"]));
	// foreach ($_POST["toassign"] as $toassign) {
	// 	echo json_encode($toassign);
	// }
	$result = false;
	for ($i = 0 ; $i < count($_POST["toassign"]) ; $i++) {
		// echo ($_POST["toassign"][$i]["collector"]);
		$strAssignRemittable = $conn->prepare("
			INSERT INTO
				tbl_assigned_remittable
			VALUES (
				NULL,
				'".$_POST["toassign"][$i]["collector"]."',
				'".$_POST["toassign"][$i]["remittableid"]."',
				'".$_POST["toassign"][$i]["seriesfrom"]."',
				'".$_POST["toassign"][$i]["seriesto"]."',
				'".$_POST["dtpAFCashTicketAssignDateAssigned"]."'
			);
		");
		$result = $strAssignRemittable->execute();
	}
	echo $result;
?>