<?php 
session_start();
include "../../alap/kapcsolat.php";

$bevitel1=$_SESSION["eladott_jegyek_id"];
$bevitel2=$_SESSION["eladott_jegyek_db"];
//$bevitelqr=$_SESSION["qr_code"];
//$bevitelqr= rand(0,100);
//echo($bevitelqr);
//$bevitelqr=rand(10,15);





$sql = "SELECT * FROM vasarlo  ORDER BY vasarlo_id desc";
$result = mysqli_query($conn, $sql);



   $row = mysqli_fetch_assoc($result);
		
	$bevitel3=$row["vasarlo_id"];	
		
		

//jegyek mennyisége frissítés
$sql = "UPDATE jegyek SET jegyek_darab = jegyek_darab-$bevitel2 WHERE jegyek_id=$bevitel1";
$result = mysqli_query($conn, $sql);



//feltöltés az eladottba
$eladottfeltolt = "INSERT INTO eladott VALUES (null,$bevitel3,$bevitel1,$bevitel2)";
$result = mysqli_query($conn, $eladottfeltolt);


//eladott id lekérdezése
$sql = "SELECT * FROM eladott  ORDER BY eladott_id DESC ";
$result = mysqli_query($conn, $sql);

   $row = mysqli_fetch_assoc($result);
		
	$bevitel4=$row["eladott_id"];	




if ($bevitel2<=1)
{
	//feltöltés a qr be
	$generaltqr = uniqid('qr');
	$qrfeltolt = "INSERT INTO qr VALUES (null,$bevitel4,'$generaltqr')";
	$result = mysqli_query($conn, $qrfeltolt);
}
else
{
	for ($i = 0; $i < $bevitel2; $i++)
	{
	//feltöltés a qr be
	$generaltqr = uniqid('qr');
	$qrfeltolt = "INSERT INTO qr VALUES (null,$bevitel4,'$generaltqr')";
	$result = mysqli_query($conn, $qrfeltolt);
	}
}



/*
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
*/
mysqli_close($conn);



?>