<?php
include ("../includes/connection.php");

if($_FILES["sql"]["tmp_name"]==""){
	echo false;
}else{
	$file = $_FILES["sql"]["tmp_name"];
	$sql = file_get_contents($file);
	$qr = $conn->exec($sql);
	echo true;
}
?>