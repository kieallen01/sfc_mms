<?php
	include ("../includes/connection.php");

	header("Content-Type: application/json");
	if ($_GET["q"] == "all") {
		$strGetStallVendors = "
			SELECT
				tbl_stall_vendor.fld_stall_vendor_id,
				tbl_stall_vendor.fld_stall_vendor_fname,
				tbl_stall_vendor.fld_stall_vendor_mname,
				tbl_stall_vendor.fld_stall_vendor_lname,
				tbl_stall_vendor.fld_stall_vendor_tin,
				tbl_stall_vendor.fld_stall_vendor_birthdate,

				tbl_stall_vendor.fld_stall_vendor_addr_prov_code,
				tbl_address_province.fld_address_province_desc,

				tbl_stall_vendor.fld_stall_vendor_addr_citymun_code,
				tbl_address_citymun.fld_address_citymun_desc,

				tbl_stall_vendor.fld_stall_vendor_addr_brgy_code,
				tbl_address_brgy.fld_address_brgy_desc,

				tbl_stall_vendor.fld_stall_vendor_sex,
				tbl_stall_vendor.fld_stall_vendor_height,
				tbl_stall_vendor.fld_stall_vendor_weight,
				tbl_stall_vendor.fld_stall_vendor_blood,
				tbl_stall_vendor.fld_stall_vendor_mobile,
				tbl_stall_vendor.fld_stall_vendor_telephone,
				tbl_stall_vendor.fld_stall_vendor_email,
				tbl_stall_vendor.fld_stall_vendor_civilstat,
				tbl_stall_vendor.fld_stall_vendor_spouse_fname,
				tbl_stall_vendor.fld_stall_vendor_spouse_mname,
				tbl_stall_vendor.fld_stall_vendor_spouse_lname,

				tbl_stall_vendor.fld_stall_number
			FROM
				tbl_stall_vendor
					INNER JOIN
						tbl_address_province ON tbl_stall_vendor.fld_stall_vendor_addr_prov_code = tbl_address_province.fld_address_province_code
					INNER JOIN
						tbl_address_citymun ON tbl_stall_vendor.fld_stall_vendor_addr_citymun_code = tbl_address_citymun.fld_address_citymun_code
					INNER JOIN
						tbl_address_brgy ON tbl_stall_vendor.fld_stall_vendor_addr_brgy_code = tbl_address_brgy.fld_address_brgy_code;
		";
		$cmdGetStallVendors = $conn->query($strGetStallVendors);
		$arrayGetStallVendors = [];
		while ($data=$cmdGetStallVendors->fetch(PDO::FETCH_BOTH)) {
			$vendorid = $data[0];
			$vendorfname = $data[1];
			$vendormname = $data[2];
			$vendorlname = $data[3];
			$vendortin = $data[4];
			$vendorbdate = $data[5];
			$vendorprovcode = $data[6];
			$vendorprovdesc = $data[7];
			$vendorcitymuncode = $data[8];
			$vendorcitymundesc = $data[9];
			$vendorbrgycode = $data[10];
			$vendorbrgydesc = $data[11];
			$vendordesc = $data[12];
			$vendorheight = $data[13];
			$vendorweight = $data[14];
			$vendorblood = $data[15];
			$vendormobile = $data[16];
			$vendortelephone = $data[17];
			$vendoremail = $data[18];
			$vendorcivilstat = $data[19];
			$vendorspousefname = $data[20];
			$vendorspousemname = $data[21];
			$vendorspouselname = $data[22];
			$stallnumber = $data[23];
			$rows = [
				"vendorid"			=>$vendorid,
				"vendorfname"		=>$vendorfname,
				"vendormname"		=>$vendormname,
				"vendorlname"		=>$vendorlname,
				"vendortin"			=>$vendortin,
				"vendorbdate"		=>$vendorbdate,
				"vendorprovcode"	=>$vendorprovcode,
				"vendorprovdesc"	=>$vendorprovdesc,
				"vendorcitymuncode"	=>$vendorcitymuncode,
				"vendorcitymundesc"	=>$vendorcitymundesc,
				"vendorbrgycode"	=>$vendorbrgycode,
				"vendorbrgydesc"	=>$vendorbrgydesc,
				"vendordesc"		=>$vendordesc,
				"vendorheight"		=>$vendorheight,
				"vendorweight"		=>$vendorweight,
				"vendorblood"		=>$vendorblood,
				"vendormobile"		=>$vendormobile,
				"vendortelephone"	=>$vendortelephone,
				"vendoremail"		=>$vendoremail,
				"vendorcivilstat"	=>$vendorcivilstat,
				"vendorspousefname"	=>$vendorspousefname,
				"vendorspousemname"	=>$vendorspousemname,
				"vendorspouselname"	=>$vendorspouselname,
				"stallnumber"		=>$stallnumber
			];
			array_push($arrayGetStallVendors,$rows);
		}
		echo json_encode($arrayGetStallVendors);
	}
	else if ($_GET["q"] == "search") {
		$strGetStallVendors = "
			SELECT
				tbl_stall_vendor.fld_stall_vendor_id,
				tbl_stall_vendor.fld_stall_vendor_fname,
				tbl_stall_vendor.fld_stall_vendor_mname,
				tbl_stall_vendor.fld_stall_vendor_lname,
				tbl_stall_vendor.fld_stall_vendor_tin,
				tbl_stall_vendor.fld_stall_vendor_birthdate,

				tbl_stall_vendor.fld_stall_vendor_addr_prov_code,
				tbl_address_province.fld_address_province_desc,

				tbl_stall_vendor.fld_stall_vendor_addr_citymun_code,
				tbl_address_citymun.fld_address_citymun_desc,

				tbl_stall_vendor.fld_stall_vendor_addr_brgy_code,
				tbl_address_brgy.fld_address_brgy_desc,

				tbl_stall_vendor.fld_stall_vendor_sex,
				tbl_stall_vendor.fld_stall_vendor_height,
				tbl_stall_vendor.fld_stall_vendor_weight,
				tbl_stall_vendor.fld_stall_vendor_blood,
				tbl_stall_vendor.fld_stall_vendor_mobile,
				tbl_stall_vendor.fld_stall_vendor_telephone,
				tbl_stall_vendor.fld_stall_vendor_email,
				tbl_stall_vendor.fld_stall_vendor_civilstat,
				tbl_stall_vendor.fld_stall_vendor_spouse_fname,
				tbl_stall_vendor.fld_stall_vendor_spouse_mname,
				tbl_stall_vendor.fld_stall_vendor_spouse_lname,

				tbl_stall_vendor.fld_stall_number
			FROM
				tbl_stall_vendor
					INNER JOIN
						tbl_address_province ON tbl_stall_vendor.fld_stall_vendor_addr_prov_code = tbl_address_province.fld_address_province_code
					INNER JOIN
						tbl_address_citymun ON tbl_stall_vendor.fld_stall_vendor_addr_citymun_code = tbl_address_citymun.fld_address_citymun_code
					INNER JOIN
						tbl_address_brgy ON tbl_stall_vendor.fld_stall_vendor_addr_brgy_code = tbl_address_brgy.fld_address_brgy_code
			WHERE
				tbl_stall_vendor.fld_stall_vendor_id = '".$_POST["vendorid"]."';
		";
		$cmdGetStallVendors = $conn->query($strGetStallVendors);
		$arrayGetStallVendors = [];
		while ($data=$cmdGetStallVendors->fetch(PDO::FETCH_BOTH)) {
			$vendorid = $data[0];
			$vendorfname = $data[1];
			$vendormname = $data[2];
			$vendorlname = $data[3];
			$vendortin = $data[4];
			$vendorbdate = $data[5];
			$vendorprovcode = $data[6];
			$vendorprovdesc = $data[7];
			$vendorcitymuncode = $data[8];
			$vendorcitymundesc = $data[9];
			$vendorbrgycode = $data[10];
			$vendorbrgydesc = $data[11];
			$vendordesc = $data[12];
			$vendorheight = $data[13];
			$vendorweight = $data[14];
			$vendorblood = $data[15];
			$vendormobile = $data[16];
			$vendortelephone = $data[17];
			$vendoremail = $data[18];
			$vendorcivilstat = $data[19];
			$vendorspousefname = $data[20];
			$vendorspousemname = $data[21];
			$vendorspouselname = $data[22];
			$stallnumber = $data[23];
			$rows = [
				"vendorid"			=>$vendorid,
				"vendorfname"		=>$vendorfname,
				"vendormname"		=>$vendormname,
				"vendorlname"		=>$vendorlname,
				"vendortin"			=>$vendortin,
				"vendorbdate"		=>$vendorbdate,
				"vendorprovcode"	=>$vendorprovcode,
				"vendorprovdesc"	=>$vendorprovdesc,
				"vendorcitymuncode"	=>$vendorcitymuncode,
				"vendorcitymundesc"	=>$vendorcitymundesc,
				"vendorbrgycode"	=>$vendorbrgycode,
				"vendorbrgydesc"	=>$vendorbrgydesc,
				"vendordesc"		=>$vendordesc,
				"vendorheight"		=>$vendorheight,
				"vendorweight"		=>$vendorweight,
				"vendorblood"		=>$vendorblood,
				"vendormobile"		=>$vendormobile,
				"vendortelephone"	=>$vendortelephone,
				"vendoremail"		=>$vendoremail,
				"vendorcivilstat"	=>$vendorcivilstat,
				"vendorspousefname"	=>$vendorspousefname,
				"vendorspousemname"	=>$vendorspousemname,
				"vendorspouselname"	=>$vendorspouselname,
				"stallnumber"		=>$stallnumber
			];
			array_push($arrayGetStallVendors,$rows);
		}
		echo json_encode($arrayGetStallVendors);
	}
?>