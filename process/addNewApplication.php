<?php
	include("../includes/connection.php");

	$Fname 			= $_POST['txtAddNewApplicationFName'];
	$Mname 			= $_POST['txtAddNewApplicationMName'];
	$Lname 			= $_POST['txtAddNewApplicationLName'];
	$Province 		= $_POST['cmbAddNewApplicationProvince'];
	$Municipality 	= $_POST['cmbAddNewApplicationMunicipality'];
	$Barangay 		= $_POST['cmbAddNewApplicationBrgys'];
	$Dob 			= $_POST['txtAddNewApplicationDOB'];
	$Citizenship 	= $_POST['txtAddNewApplicationCitizenship'];
	// $Photo 			= $_POST['txtAddNewApplicationPhoto'];
	$Gender 		= $_POST['cmbAddNewApplicationSex'];

	$CivilStatus 	= $_POST['cmbAddNewApplicationCivilStatus'];
	$sFname 		= !empty($_POST['txtAddNewApplicationFNameSpouse']) 		? $_POST['txtAddNewApplicationFNameSpouse']	: NULL;
	$sMname 		= !empty($_POST['txtAddNewApplicationMNameSpouse']) 		? $_POST['txtAddNewApplicationMNameSpouse'] : NULL;
	$sLname			= !empty($_POST['txtAddNewApplicationLNameSpouse']) 		? $_POST['txtAddNewApplicationLNameSpouse'] : NULL;
	$sProvince		= !empty($_POST['cmbAddNewApplicationProvinceSpouse']) 		? $_POST['cmbAddNewApplicationProvinceSpouse'] : NULL;
	$sMunicipality 	= !empty($_POST['cmbAddNewApplicationMunicipalitySpouse'])  ? $_POST['cmbAddNewApplicationMunicipalitySpouse'] : NULL;
	$sBarangay 		= !empty($_POST['cmbAddNewApplicationBrgySpouse']) 			? $_POST['cmbAddNewApplicationBrgySpouse'] : NULL;

	$BusinessType 	= $_POST['cmbAddNewApplicationBusinessType'];
	$OwnershipType 	= $_POST['cmbAddNewApplicationOwnershipType'];
	$Capital 		= $_POST['txtAddNewApplicationCapital'];
	$Goods			= $_POST['goods'];

	$employed 		= $_POST['cmbAddNewApplicationEmployed'];
	$office 		= !empty($_POST['txtAddNewApplicationOffice']) 				? $_POST['txtAddNewApplicationOffice'] : NULL;
	$otherBusiness 	= !empty($_POST['txtAddNewApplicationOtherBusinesses']) 	? $_POST['txtAddNewApplicationOtherBusinesses'] : NULL; 
	$businessPermit = !empty($_POST['txtAddNewApplicationBPermitNo']) 			? $_POST['txtAddNewApplicationBPermitNo'] : NULL;
	$dateApplied	= date("Y-m-d h:i:s");

	$strCheckLastID = " SELECT (fld_stall_application_id) FROM tbl_stall_application GROUP BY fld_stall_application_id";
	$cmdCheckLastID = $conn->query($strCheckLastID);
	$lastID = ($cmdCheckLastID->rowCount()+1);

	$strAddApplication = $conn->prepare("
		INSERT INTO
			tbl_stall_application
		VALUES (
			'".$lastID."',
			'".$BusinessType."',
			'".$OwnershipType."',
			'".$employed."',
			'".$office."',
			'".$otherBusiness."',
			'".$businessPermit."',
			'".$Capital."',
			'".$dateApplied."',
			'0',
			NULL,
			NULL
		)
	");

	$strAddApplicationProfile = $conn->prepare("
		INSERT INTO
			tbl_stall_applicant
		VALUES (
			'".$lastID."',
			'".$Fname."',
			'".$Mname."',
			'".$Lname."',
			'".$Province."',
			'".$Municipality."',
			'".$Barangay."',
			'".$Dob."',
			'".$Citizenship."',
			'".$CivilStatus."',
			NULL,
			'".$Gender ."'
		)
	");

	$strAddSpouse = $conn->prepare("
		INSERT INTO
			tbl_stall_applicant_spouse 
		VALUES (
			'".$lastID."',
			'".$sFname."',
			'".$sMname."',
			'".$sLname."',
			'".$sProvince."',
			'".$sMunicipality."',
			'".$sBarangay."'
		)
	");

	if($strAddApplication->execute()){
		if($strAddApplicationProfile->execute()){
			if($strAddSpouse->execute()){
				foreach ($Goods as $choosenGoods) {
					$strAddGoods = $conn->prepare("
						INSERT INTO
							tbl_stall_approved
						VALUES (
							'".$choosenGoods."',
							'".$lastID."',
							NULL
						)
					");
					echo $strAddGoods->execute();
				}
			}else{
				echo 'add spouse failed';
			}
		}else{
			echo 'application profile failed';
		}
	}else{
		echo 'add application failed';
	}
	/*
		NOTES:
	 		- removed business name (20171121-0808)
	 		- set application photo to null (20171121-0828)
	*/
?>