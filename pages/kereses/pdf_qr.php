<?php
require('tfpdf.php');
include "../../alap/kapcsolat.php"; 



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

	


$pdf = new tFPDF('p', 'mm', 'A4');

//annyi oldal beszúrása ahány eladott jegy van
for ($i = 0; $i < $eladott_jegyek_db; $i++)
{
	//annyi oldal beszúrása ahány eladott jegy van
	$pdf->AddPage();

	$pdf->Image("http://localhost/tanulo/pappdaniel_2021_11_11/pages/kereses/qr_generator.php?code=".($results_arr[$i]), 10, 10, 30, 30, "png");
	$pdf->Image("http://localhost/tanulo/pappdaniel_2021_11_11/kepek/".($esemeny_kep), 100, 10, 100, "jpg");
		

}




$pdf->Output();

?>