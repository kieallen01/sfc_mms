<?php
	session_start();
	date_default_timezone_set("Asia/Manila");
	require '../packages/vendor/autoload.php';	
	use Dompdf\Dompdf;

	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
	$dompdf->loadHtml('
		<!DOCTYPE html>
		<title>Notice_of_Delinquency_[NAME OF DELINQUENT]_'.date('Y-m-d').'.pdf</title>
			<body style = "font-size: 14px; font-family: Helvetica;">
				<div id = "header" style = "text-align: center; font-weight: bold; font-size: 16px;">
					<p><img src = "../seal.png" style = "height: 13%; width: 13%;"></p>
					<p>OFFICE OF THE CITY TREASURER</p>
					<br>
					<p style = "text-decoration: underline;">NOTICE OF DELINQUENCY</p>
				</div>

				<div id = "content" style = "margin-left: 84px; margin-right: 96px; margin-top: 12px; margin-bottom: 4em;">
					<br>
					<div id = "date" style = "text-align: right;">'.date('F d, Y').'</div>
					<br>
					<div id = "inside_address">
						<div>[NAME OF DELINQUENT]</div>
						<div>[STALL/S]</div>
						<div>[MARKET FACILITY]</div>
						<div>City of San Fernando, La Union</div>
					</div>
					<div id = "greetings">
						<p>Dear <span id = "delinquent" style = "text-decoration: underline;">[SURNAME OF DELINQUENT]</span>,</p>
					</div>
					<div id = "body" style = "text-align: justify">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This refers to your contract of lease with the City Government of San Fernando, La Uinion as stall lesse located at [MARKET FACILITY], this city. Our records shows that as of <strong>[LATEST 20th OF THE MONTH]</strong> your account balance has accumulated to <strong>[AMOUNT BALANCE, IN WORDS] ([AMOUNT BALANCE IN NUMBERS])</strong> due to non-payment of your stall fee which covers the period of <strong>[THE THREE MONTHS NOT PAID]</strong>. As a result of your non-compliance to your obligation as indicated in the contract of lease, you have thiry days from the given date to settle and comply of your obligation, other wise, this office will recommend the forfeiture of your rights as a stall lessee and consequently, the foreclosure of your business establishment.</p>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please settle immediately the above stated amountl. For any question/inquiry, feel free to coordinate with our office or the office of market supervisor to avoid penalties and impending forfeiture of rights.</p>
					</div>
					<div id = "complimentary_close" style = "padding-right: 4rem; text-align: right;">
						<div>Very truly yours,</div>
						<br>
						<br>
						<br>
						<div>
							<div><strong>EDMAR C. LUNA</strong></div>
							<div style = "padding-right: 0.5rem;">City Treasurer</div>
						</div>
					</div>
				</div>

				<div style = "position: fixed; bottom: 0px; font-size: 10px; text-align: right">
					Market Management System - Notice of Delinquency / '.$_SESSION["userfname"].' '.$_SESSION["userlname"].' / '.date('m-d-Y h:m:s').'
				</div>
			</body>
		</html>
	');
	// $dompdf->loadHtml('
	// 	<body>
	// 		<table cellspacing = "0" width = "100%" border = "1px">

	// 		</table>
	// 	</body
	// ');

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'portrait');

	// Render the HTML as PDF
	$dompdf->render();

	// Output the generated PDF to Browser
	$dompdf->stream("Notice_of_Delinquency_[NAME OF DELINQUENT]_".date('Y-m-d').".pdf", ["Attachment" => false]);
?>