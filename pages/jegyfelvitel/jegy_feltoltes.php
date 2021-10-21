<?php 
session_start();
include "../../alap/kapcsolat.php";
$bevitel2=$_POST["bevitel2"];
$bevitel3=$_POST["bevitel3"];
$bevitel4=$_POST["bevitel4"];

$esemenyazon=$_SESSION["esemenyazon"];

$sql = "INSERT INTO jegyek
VALUES (null,'$esemenyazon', '$bevitel2', '$bevitel3','$bevitel4')";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>