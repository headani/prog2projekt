<?php 
include "kapcsolat.php";
$felhasznalonev=$_POST["felhasznalonev"];
$jelszo=md5($_POST["jelszo"]);

$sql="select felhasznalo_nev from felhasznalo where felhasznalo_nev ='$felhasznalonev'";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)>0)
	echo 2;
else
{
$sql = "INSERT INTO felhasznalo
VALUES (null, '$felhasznalonev', '$jelszo', 0)";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
}
mysqli_close($conn);
?>