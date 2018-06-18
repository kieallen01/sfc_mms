<?php
	session_start();
	date_default_timezone_set("Asia/Manila");
	require '../packages/vendor/autoload.php';	
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml('
		<!DOCTYPE html>
		<title>Market_Stall_Award_[NAME OF DELINQUENT]_'.date('Y-m-d').'.pdf</title>
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
						<div>[Owner]</div>
						<div>[Address]</div>
						
					</div>
					<div id = "greetings">
						<p>Sir/Madam:</p>
					</div>
					<div id = "body" style = "text-align: justify">
						<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please be informed that the Market Committee on Awards has approved your application and has thus awarded you the right to lease the following stall/s in the Shopping Mall, this city:</div>
					</div>
					<table cellspacing = "10" width = "100%" border = "0" style = "font-weight: bold; padding-left: 3rem; table-layout: fixed">
						<tr>
							<td>Location</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shopping Mall</td>
						</tr>

						<tr>
							<td>Building</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A</td>
						</tr>

						<tr>
							<td>Section</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pharmaceutical</td>
						</tr>

						<tr>
							<td>Stall number/s</td>
							<td>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1, 2, 3</td>
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

					<div style = "padding-top: 3em;">
						<em>
							<div>Note: Lorem ipsum uspi me rol</div>
							<div>Effectivity: '.date('F Y').'</div>
						</em>
					</div>
				</div>

				<div style = "position: fixed; bottom: 0px; font-size: 10px; text-align: right">
					Market Management System - Market Stall Award / '.$_SESSION["adminfname"].' '.$_SESSION["adminlname"].' / '.date('m-d-Y h:m:s').'
				</div>
			</body>
		</html>
	');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('letter', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("Market_Stall_Award_[NAME OF DELINQUENT]_".date('Y-m-d').".pdf", ["Attachment" => false]);
?>