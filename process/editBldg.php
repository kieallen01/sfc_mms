<?php
	include("../includes/connection.php");

	$strEditBldg = $conn->prepare("
		UPDATE tbl_bldg 
		SET 
			fld_bldg_name = '".$_POST["txtEditBuildingName"]."'
		WHERE 
			fld_bldg_id = '".$_POST["txthiddenEditBuildingID"]."';
	");

	echo($strEditBldg->execute());
?>