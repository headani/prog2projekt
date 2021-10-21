<?php
require('tfpdf.php'); 
$tombhossz=$_POST['tombhossz']; 
$bevitel2=$_POST['bevitel2'];
$ev=$_POST['ev'];
$honap=$_POST['honap'];

$pdf = new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->Ln(10);
$pdf->SetFont('DejaVu','',20);
$pdf->Cell(80);
$pdf->Cell(30,10,$ev.'.'.$honap.'. havi fizetések',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('DejaVu','',12);
$pdf->Cell(20);
$pdf->Cell(40,8,'Név',1,0,'C');
$pdf->Cell(28,8,'Műszakszám',1,0,'C');
$pdf->Cell(20,8,'Órabér',1,0,'C');
$pdf->Cell(30,8,'Bruttó fizetés',1,0,'C');
$pdf->Cell(30,8,'Nettó fizetés',1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('DejaVu','',12);

for ($i = 0; $i < $tombhossz; $i++) 
{
	$pdf->Cell(20);
	$pdf->Cell(40,8,$_POST['bevitel_'.$i.'_0'],1);
	$pdf->Cell(28,8,$_POST['bevitel_'.$i.'_1'].' db',1,0,'C');
	$pdf->Cell(20,8,$_POST['bevitel_'.$i.'_2'].' Ft',1,0,'R');
	$pdf->Cell(30,8,$_POST['bevitel_'.$i.'_3'].' Ft',1,0,'R');
	$pdf->Cell(30,8,$_POST['bevitel_'.$i.'_4'].' Ft',1,0,'R');
	$pdf->Ln(8);
}

$pdf->Ln(10);


$path = "fizetesek.pdf";
$pdf->Output($path,'F');
print $path;
?>
