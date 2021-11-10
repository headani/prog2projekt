<?php
require('tfpdf.php');
include "../../alap/kapcsolat.php"; 


//eladott jegyek db lekérdezése
$sql = "SELECT * FROM eladott  ORDER BY eladott_id DESC ";
$result = mysqli_query($conn, $sql);

   $row = mysqli_fetch_assoc($result);
		
	$eladott_jegyek_db=$row["eladott_jegyek_db"];	



//qr kod lekerdezes

$sql = "SELECT * FROM qr ORDER BY qr_id desc";
		
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
	
	$qr = mysqli_fetch_assoc($result);
	





$pdf = new tFPDF('p', 'mm', 'A4');

//annyi oldal beszúrása ahány eladott jegy van
//for ($i = 0; $i < $eladott_jegyek_db; $i++)
	$pdf->AddPage();



//jegyek eltoltasa
$magassag = 10;

if($eladott_jegyek_db >= 1)
{
	for ($i = 0; $i < $eladott_jegyek_db; $i++)
	{
		
		$pdf->Image("http://localhost/tanulo/pappdaniel_2021_11_03/pages/kereses/qr_generator.php?code=".($qr['qr_code']), 10, $magassag, 30, 30, "png");
		
		$magassag=$magassag+40;
	}
	
}




$pdf->Output();

?>