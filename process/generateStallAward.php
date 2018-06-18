<?php
	session_start();
	date_default_timezone_set("Asia/Manila");
	include('../includes/connection.php');
	require '../packages/vendor/autoload.php';	
	use Dompdf\Dompdf;

	//get stall award content first
	$strGetStallAwardContent = "
		SELECT
			tbl_stall.fld_market_facility_id,
			tbl_market_facility.fld_market_facility_name,

			tbl_stall.fld_bldg_id,
			tbl_bldg.fld_bldg_name,

			tbl_stall.fld_section_id,
			tbl_section.fld_section_name,

			tbl_stall.fld_stall_number,

			tbl_stall.fld_stall_application_id,
			tbl_stall_applicant.fld_stall_applicant_fname,
			tbl_stall_applicant.fld_stall_applicant_mname,
			tbl_stall_applicant.fld_stall_applicant_lname,
			tbl_stall_application.fld_stall_application_effectivity,

			tbl_address_province.fld_address_province_desc,
			tbl_address_citymun.fld_address_citymun_desc,
			tbl_address_brgy.fld_address_brgy_desc,

			tbl_stall_application.fld_stall_application_notes
		FROM
			tbl_stall
		INNER JOIN
			tbl_market_facility ON tbl_stall.fld_market_facility_id = tbl_market_facility.fld_market_facility_id
		INNER JOIN
			tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
		INNER JOIN
			tbl_section ON tbl_stall.fld_section_id = tbl_section.fld_section_id
		INNER JOIN
			tbl_stall_applicant ON tbl_stall.fld_stall_application_id = tbl_stall_applicant.fld_stall_application_id
		INNER JOIN
			tbl_address_province ON tbl_stall_applicant.fld_address_province_code = tbl_address_province.fld_address_province_code
		INNER JOIN
			tbl_address_citymun ON tbl_stall_applicant.fld_address_citymun_code = tbl_address_citymun.fld_address_citymun_code
		INNER JOIN
			tbl_address_brgy ON tbl_stall_applicant.fld_address_brgy_code = tbl_address_brgy.fld_address_brgy_code
		INNER JOIN
			tbl_stall_application ON tbl_stall.fld_stall_application_id = tbl_stall_application.fld_stall_application_id
		WHERE
			tbl_stall.fld_stall_application_id = '".$_GET["id"]."'
		GROUP BY
			tbl_stall.fld_stall_application_id;
	";
	$cmdGetStallAwardContent = $conn->query($strGetStallAwardContent);
	$arrayGetStallAwardContent = [];
	while ($data=$cmdGetStallAwardContent->fetch(PDO::FETCH_BOTH)) {
		//MARKET FACILITY
		$marketfacilityid 		= $data[0];
		$marketfacilityname 	= $data[1];
		$bldgid 				= $data[2];
		$bldgname 				= $data[3];
		$sectionid 				= $data[4];
		$sectionname 			= $data[5];
		$stallnumber 			= $data[6];
		$stallapplicationid 	= $data[7];
		$ownerfname				= $data[8];
		$ownermname				= $data[9];
		$ownerlname				= $data[10];
		$dateofeffectivity		= $data[11];
		$provincedesc 			= $data[12];
		$citymundesc 			= $data[13];
		$brgydesc 				= $data[14];
		$stallapplicationnotes	= $data[15];

		$stalls					= "";
		$strGetStallsAssigned	= "
			SELECT
			-- 	tbl_stall.fld_bldg_id,
			-- 	tbl_bldg.fld_bldg_name,
			-- 	tbl_stall.fld_stall_number
				concat(tbl_bldg.fld_bldg_name, tbl_stall.fld_stall_number)
			FROM
				tbl_stall
					INNER JOIN
						tbl_bldg ON tbl_stall.fld_bldg_id = tbl_bldg.fld_bldg_id
			WHERE
				tbl_stall.fld_stall_application_id = '".$stallapplicationid."';
		";
		$cmdGetStallsAssigned = $conn->query($strGetStallsAssigned);
		while ($data2=$cmdGetStallsAssigned->fetch(PDO::FETCH_BOTH)) {
			$stalls = $stalls . ', ' . $data2[0];
		}
	}

	header ("Content-type: application/pdf");
	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml('
		<!DOCTYPE html>
		<title>Market_Stall_Award_'.$ownerfname.'_'.$ownerlname.'_'.date('Y-m-d').'.pdf</title>
		<html lang = "en-us">
			<body style = "font-size: 14px; font-family: Helvetica;">
			<div id = "header" style = "text-align: center;font-size: 16px;">
				<p><img src = "../seal.png" style = "height: 13%; width: 13%;"></p>
				<div>Republic of the Philippines</div>
				<div>Province of La Union</div>
				<div><b>CITY OF SAN FERNANDO</b></div></div>
				
				<div id = "header" style = "text-align: center; font-weight: bold; font-size: 16px;">
					<p style = "text-decoration: underline;">MARKET COMMITTEE ON AWARDS</p>
				</div>

				<div id = "content" style = "margin-left: 84px; margin-right: 96px; margin-top: 12px; margin-bottom: 4em;">
					<br>
					<div id = "date" style = "text-align: right;">'.date('F d, Y').'</div>
					<br>
					<div id = "inside_address">
						<div><strong>'.$ownerfname.' '.$ownerlname.'</strong></div>
						<div style = "text-decoration: underline;">'.$provincedesc.', '.$citymundesc.', '.$brgydesc.'</div>
						
					</div>
					<div id = "greetings">
						<p>Sir/Madam:</p>
					</div>
					<div id = "body" style = "text-align: justify">
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please be informed that the Market Committee on Awards has approved your application and has thus awarded you the right to lease the following stall/s in the '.$marketfacilityname.', this city:</div>
					</div>
					<table cellspacing = "10" width = "100%" border = "0" style = "font-weight: bold; padding-left: 3rem; table-layout: fixed">
						<tr>
							<td>Location</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$marketfacilityname.'</td>
						</tr>

						<tr>
							<td>Building</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$bldgname.'</td>
						</tr>

						<tr>
							<td>Section</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$sectionname.'</td>
						</tr>

						<tr>
							<td>Stall number/s</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$stalls.'</td>
						</tr>
					</table>
					<div id = "body" style = "text-align: justify">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In conformity with Ordinance No. 4, series of 1991 of the City Council, you are hereby requested/advised to execute the Contract of Lease between you and the city for the lease of the aforementioned stall/s.</p>
					</div>

					<table cellspacing = "0" cellpadding = "" width = "100%" border = "0" style = "padding-top: 3.5em; table-layout: fixed; text-align: center;">
						<tr>
							<td>
								<div><strong>HON. JOSEPH BERNARD D. VALERO</strong></div>
								<div><i>Rep. of the City Council</i></div>
							</td>
							<td>&nbsp;</td>
							<td>
								<div><strong>HON. HERMENEGILDO A. GUALBERTO</strong></div>
								<div><i>City Mayor</i></div>
							</td>
						</tr>

						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>

						<tr>
							<td>
								<div>______________________________</div>
								<div>Rep., Market Vendors Assn.</div>
							</td>
							<td>&nbsp;</td>
							<td>
								<div><strong>EDMAR C. LUNA</strong></div>
								<div>City Treasurer</div>
							</td>
						</tr>
					</table>

					<div style = "padding-top: 3em; font-size: 12px;">
						<em>
							<div>Note: '.$stallapplicationnotes.'</div>
							<div>Effectivity: '.date('F Y').'</div>
						</em>
					</div>
				</div>

				<div style = "position: fixed; bottom: 0px; font-size: 10px; text-align: right">
					Market Management System - Market Stall Award / '.$_SESSION["userfname"].' '.$_SESSION["userlname"].' / '.date('m-d-Y h:m:s').'
				</div>
			</body>
		</html>
	');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('letter', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	($dompdf->stream("Market_Stall_Award_".$ownerfname.'_'.$ownerlname."_".date('Y-m-d').".pdf", ["Attachment" => false]));
?>