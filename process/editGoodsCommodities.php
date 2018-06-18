<?php
	include ("../includes/connection.php");

	$strEditGoodsCommodities = $conn->prepare("
		UPDATE
			tbl_goodscommodities
		SET
			fld_goodscommodities_desc = '".$_POST["txtEditGoodsCommoditiesDesc"]."',
			fld_businesstype_id = '".$_POST["cmbEditGoodsCommoditiesBusinessTypeID"]."'
		WHERE
			fld_goodscommodities_id = '".$_POST["txthiddenEditGoodsCommoditiesID"]."';
	");

	echo ($strEditGoodsCommodities->execute());
?>