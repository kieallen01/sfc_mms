<?php
	include ("../includes/connection.php");

	$strDeleteGoodsCommodities = $conn->prepare("
		DELETE FROM
			tbl_goodscommodities
		WHERE
			tbl_goodscommodities.fld_goodscommodities_id = '".$_POST["GCid"]."';
	");

	echo ($strDeleteGoodsCommodities->execute());
?>