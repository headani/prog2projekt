<?php

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

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);//end of line



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
	




//pdf_qr beagyazas proba

//eladott jegyek db lekérdezése
$sql = "SELECT * FROM eladott  ORDER BY eladott_id DESC ";
$result = mysqli_query($conn, $sql);

   $row = mysqli_fetch_assoc($result);
		
	$eladott_jegyek_db=$row["eladott_jegyek_db"];
	$eladott_id=$row["eladott_id"];	
	$eladott_jegyek_id=$row["eladott_jegyek_id"];


//eladott jegyhez tartozo esemeny lekerdezese
$sql = "SELECT `esemeny_kep` FROM `esemeny` 
INNER JOIN jegyek ON esemeny.esemeny_id = jegyek.esemeny_id
INNER JOIN eladott ON jegyek.jegyek_id=$eladott_jegyek_id";
$result = mysqli_query($conn, $sql);

   $row = mysqli_fetch_assoc($result);
		
	$esemeny_kep=$row["esemeny_kep"];



//qr kod lekerdezes

$sql = "SELECT * FROM qr  
INNER JOIN eladott
ON qr.qr_eladott_id=eladott.eladott_id
WHERE qr.qr_eladott_id=$eladott_id";


	
$result = mysqli_query($conn, $sql);


$results_arr = []; 
while ($row = $result->fetch_assoc()) { 
  $results_arr[] = $row['qr_code']; 
}

	



//annyi oldal beszúrása ahány eladott jegy van
for ($i = 0; $i < $eladott_jegyek_db; $i++)
{
	//annyi oldal beszúrása ahány eladott jegy van
	$pdf->AddPage();

	$pdf->Image("http://localhost/tanulo/pappdaniel_2021/pages/kereses/qr_generator.php?code=".($results_arr[$i]), 10, 10, 30, 30, "png");
	$pdf->Image("http://localhost/tanulo/pappdaniel_2021/kepek/".($esemeny_kep), 100, 10, 100, "jpg");
		

}
//proba vege






$path = "Rendelesek.pdf";
$pdf->Output($path,'F');
print $path;
?>
