<?php
	// Include the main TCPDF library (search for installation path).
	// include('../includes/connection.php');

	include('../packages/fpdf/fpdf.php');
	class PDF extends FPDF
	{
	function Footer()
	{
	    // Go to 1.5 cm from bottom
	    $this->SetY(-15);
	    // Select Arial italic 8
	    $this->SetFont('Arial','I',8);

	    // Print centered page number
	    $this->Cell(0,10,'Market Management Report/user name/date',0,0,'R');//user here<------------------------------------------------
	}
	}
	// create new PDF document
	$pdf= new PDF('P','mm', array(215.9,330.2 ));

	// set margins
	$pdf->SetMargins(35, 20,20);

	$pdf->SetTitle('Market Award');

	// add a page
	$pdf->AddPage();
	$image1 = "../seal.png";
	$pdf->setfont('Helvetica','',11.5);
	$pdf->cell(0,26,$pdf->Image($image1, 102, $pdf->GetY(), 25),0,1,'C');
	
	$pdf->setfont('Helvetica','',11.5);
	$pdf->cell(0,5,'Republic of the Philippines',0,1,'C');
	$pdf->cell(0,5,'Province of La Union',0,1,'C');
	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(0,5,'CITY OF SAN FERNANDO',0,1,'C');
	$pdf->cell(0,5,'',0,1,'C');
	$pdf->setfont('Helvetica','BU',11.5);
	$pdf->cell(0,5,'MARKET COMMITTEE ON AWARDS',0,1,'C');

	$pdf->ln(5);

	$pdf->cell(80,5,'',0,0);
	$pdf->setfont('Helvetica','U',11.5);
	$pdf->cell(0,5,date('F d, Y'),0,0,'C');
	$pdf->setfont('Helvetica','',11.5);
	$pdf->cell(0,5,'',0,1);
	
	$pdf->ln(5);
	$pdf->cell(115,5,'',0,0);
	$pdf->setfont('Helvetica','BI',11.5);
	$pdf->cell(10,5,'Date',0,1);

	$pdf->ln(5);

	$pdf->setfont('Helvetica','BU',11.5);
	$pdf->cell(30,5,'OWNER',0,1); //owner trim($_POST["owner"])
	$pdf->setfont('Helvetica','',11.5);
	$pdf->cell(30,5,'ADDRESS',0,1);//ADDRESS $_POST['address']

	$pdf->ln(5);

	$pdf->cell(30,5,'Sir/Madam:',0,1);

	$pdf->ln(3);



	$pdf->multicell(0,5,'               Please be informed that the Market Committee on Awards has approved your application and has thus awarded you the right to lease the following stall/s in the Shopping Mall, this city:',0,1,0,'J');

	$pdf->ln(5);
	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(15,5,'',0,0);
	$pdf->cell(75,5,'Location',0,0);
	$pdf->cell(5,5,'-',0,0);
	$pdf->setfont('Helvetica','BI',11.5);
	$pdf->cell(0,5,'market facility',0,1); //market facility $_POST["mf"]

	$pdf->ln(5);
	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(15,5,'',0,0);
	$pdf->cell(75,5,'Building',0,0);
	$pdf->cell(5,5,'-',0,0);
	$pdf->cell(0,5,'Building',0,1); //building $_POST["bldg"]

	$pdf->ln(5);
	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(15,5,'',0,0);
	$pdf->cell(75,5,'Section/Zone',0,0);
	$pdf->cell(5,5,'-',0,0);
	$pdf->cell(0,5,'SECTION',0,1); //section $_POST["sec"]

	$pdf->ln(5);
	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(15,5,'',0,0);
	$pdf->cell(75,5,'Stall Number/s',0,0);
	$pdf->cell(5,5,'-',0,0);
	$pdf->cell(0,5,'stalls',0,1); //stalls $_POST["stalls"]

	$pdf->ln(5);
	$pdf->setfont('Helvetica','',11.5);
	$pdf->multicell(0,5,'              In conformity with Ordinance No. 4, series of 1991 of the City Council, you are hereby requested/advised to execute the Contract of Lease between you and the city for the lease of the aforementioned stall/s.',0,1,0,'J');

	$pdf->ln(20);


	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(147,5,'HON. HERMENEGILDO A.',0,1,'R');

	$pdf->cell(60,5,'HON. JOSEPH BERNARD D. VALERO',0,0);
	$pdf->cell(74,5,'GUALBERTO',0,1,'R');

	$pdf->setfont('Helvetica','I',11.5);
	$pdf->cell(76,5,'Rep. of the City Council',0,0,'C');
	$pdf->cell(54,5,'City Mayor',0,1,'R');

	$pdf->ln(20);

	$pdf->setfont('Helvetica','B',11.5);
	$pdf->cell(76,5,'','B',0,'C');
	$pdf->cell(60,5,'EDMAR C. LUNA',0,1,'R');

	$pdf->setfont('Helvetica','I',11.5);
	$pdf->cell(76,5,'Rep., Market Vendors Assn. ',0,0,'C');
	$pdf->cell(56,5,'City Treasurer',0,1,'R');

	$pdf->ln(15);
	$pdf->cell(0,5,'Note: Vice - Magdalena Peralta',0,1);
	$pdf->cell(0,5,'Effectivity - DATE ',0,1);// .date("F Y",strtotime($_POST["date_effectivity"])
	


	//Close and output PDF document
	$pdf->Output('Market Award.pdf', 'I');
?>