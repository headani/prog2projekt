<?php 
session_start();
$login_id = $_SESSION["loginid"];

include "../../alap/kapcsolat.php";
$bevitel1=$_POST["bevitel1"];
$bevitel2=$_POST["bevitel2"];
$bevitel3=$_POST["bevitel3"];
$bevitel4=$_POST["bevitel4"];
$bevitel5=$_POST["bevitel5"];
$bevitel7=$_POST["bevitel7"];

$sql = "INSERT INTO esemeny
VALUES (null,'$bevitel1', '$bevitel2', '$bevitel3','$bevitel4', '$bevitel5',$login_id,$bevitel7)";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>