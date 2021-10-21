<?php 
session_start();
$bevitel1=$_POST["bevitel1"];

include "../../alap/kapcsolat.php";


$sql = "UPDATE felhasznalo
SET felhasznalo_rang=0 WHERE felhasznalo_id=$bevitel1";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>