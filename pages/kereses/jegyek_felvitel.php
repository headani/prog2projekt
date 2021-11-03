<?php 
session_start();
include "../../alap/kapcsolat.php";

$bevitel1=$_SESSION["eladott_jegyek_id"];
$bevitel2=$_SESSION["eladott_jegyek_db"];






$sql = "SELECT * FROM vasarlo  ORDER BY vasarlo_id desc";
$result = mysqli_query($conn, $sql);



   $row = mysqli_fetch_assoc($result);
		
	$bevitel3=$row["vasarlo_id"];	
		
		


$sql = "UPDATE jegyek SET jegyek_darab = jegyek_darab-$bevitel2 WHERE jegyek_id=$bevitel1";
$result = mysqli_query($conn, $sql);



//feltöltés az eladottba
 $sql = "INSERT INTO eladott VALUES (null,$bevitel3,$bevitel1,$bevitel2)";
 	$result = mysqli_query($conn, $sql);

//feltöltés a qr be
/*
if($_SESSION["eladott_jegyek_db"]>1){
	
for($i = 0; $i<=$_SESSION["eladott_jegyek_db"]; $i++) {      
    
		$sql = "INSERT INTO qr VALUES (null,$bevitel1,$bevitel1)";
    }
	
}
else
{
	$sql = "INSERT INTO qr VALUES (null,$bevitel1,'0101')";
	$result = mysqli_query($conn, $sql);
}
*/

$sql = "INSERT INTO qr VALUES (null,$bevitel1,'0101')";
	$result = mysqli_query($conn, $sql);

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>