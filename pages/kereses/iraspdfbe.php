<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require('tfpdf.php');
require("phpqrcode/qrlib.php");
include "../../alap/kapcsolat.php"; 
$bevitel1=$_POST['bevitel1']; // rendeles id



// jegyek  paraméter 
$sql = "SELECT * FROM eladott 
INNER JOIN vasarlo ON eladott.eladott_vasarlo_id=vasarlo.vasarlo_id
ORDER BY vasarlo_id desc";
		
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
	
	$sor2 = mysqli_fetch_assoc($result);


	


//qr kod lekerdezes
$sql = "SELECT * FROM qr ORDER BY qr_id desc";
		
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
	
	$qr = mysqli_fetch_assoc($result);




$pdf = new tFPDF('p', 'mm', 'A4');



//annyi oldal ahány jegy

$pdf->AddPage();


// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',10);



$pdf->Cell(130 ,5,'Debrecen Tickets',0,1);

//set font to arial, regular, 12pt
//$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Budai Ézsaiás utca]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[Debrecen, Magyarország, 4030]',0,1);

////valahova ide kellene beirni a qr kodot majd
$pdf->Cell(130 ,5,'Telefon [+12345678]',0,0);
$pdf->Cell(30 ,5,'Számlaszám: ',0,0);
$pdf->Cell(34 ,5,$sor2['eladott_id'],0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(30 ,5,'Qr kód:',0,0);
$pdf->Cell(34 ,5,$qr['qr_code'],0,1);//end of line


//
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(30 ,5,'Qr kód:',0,0);
$pdf->Cell(34 ,5,$qrkep,0,1);//end of line

//this is the first method
$pdf->Image("http://localhost/tanulo/pappdaniel_2021_11_03/pages/kereses/qr_generator.php?code=".$qr['qr_code'], 10, 10, 20, 20, "png");



//this is the second method
//$pdf->Image("test.png", 40, 10, 20, 20, "png");


//rendeles szam
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(30 ,5,'Számlaszám: ',0,0);
$pdf->Cell(34 ,5,$sor2['eladott_id'],0,1);//end of line

// nagy üres cella , térköznek
$pdf->Cell(189 ,10,'',0,1);//end of line

//számlázási cím
$pdf->Cell(100 ,5,'Vásárló',0,1);//end of line

//behuzas erdekeben egy ures sor minden sor elejere
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$sor2['vasarlo_nev'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$sor2['vasarlo_lakcim'],0,1);



//üres cella térköznek
$pdf->Cell(189 ,10,'',0,1);//end of line




	
	

$sql = "SELECT esemeny_nev,jegyek_tipus,eladott_jegyek_db,jegyek_ar, eladott_jegyek_db*jegyek_ar AS ar
FROM jegyek 
INNER JOIN eladott ON jegyek.jegyek_id=eladott.eladott_jegyek_id
INNER JOIN esemeny ON esemeny.esemeny_id=jegyek.esemeny_id
INNER JOIN vasarlo ON eladott.eladott_vasarlo_id=vasarlo.vasarlo_id
ORDER BY eladott_id desc LIMIT 1";
		
$result = mysqli_query($conn, $sql);




//jegyadatok
//$pdf->SetFont('Arial','B',12);

$pdf->Cell(110 ,5,'Esemény',1,0);

$pdf->Cell(30 ,5,'Jegytípus',1,0);
$pdf->Cell(15 ,5,'Darab',1,0);
$pdf->Cell(20 ,5,'Jegyár ',1,0);
$pdf->Cell(20 ,5,'Összesen ',1,1);//end of line

//$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
	
	while($row = mysqli_fetch_assoc($result)) {

$pdf->Cell(110 ,5,$row['esemeny_nev'],1,0);
$pdf->Cell(30 ,5,$row['jegyek_tipus'],1,0);
$pdf->Cell(15 ,5,$row['eladott_jegyek_db'],1,0);
$pdf->Cell(20 ,5,$row['jegyek_ar'],1,0);
$pdf->Cell(20 ,5,$row['ar'],1,1,'R');//end of line
	}
	
/*	
$pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line
*/
//summary
/*
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Összesen',0,0);
$pdf->Cell(4 ,5,'Ft',0,0);
$pdf->Cell(30 ,5,$sor2['ar'],0,1,'R');//end of line
*/
	
	
	
/*
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

*/

// Load a UTF-8 string from a file and print it
$txt = '';



	
						

$pdf->Write(8,$txt);

$pdf->Ln(10);
//$pdf->Write(5,'blablabla....');
//$pdf->Write(6,$kimenet);


//$pdf->Ln(10);
//$pdf->Write(5);

$path = "Rendelesek.pdf";
$pdf->Output($path,'F');
print $path;
?>
