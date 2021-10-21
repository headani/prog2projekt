<?php 
session_start();

include "../../alap/kapcsolat.php";

$bevitel3=$_POST["bevitel3"];
$bevitel4=$_POST["bevitel4"];

//$bevitel3=$_SESSION["vasarlo_nev"];
//$bevitel4=$_SESSION["vasarlo_lakcim"];

$sql = "INSERT INTO vasarlo
VALUES (null, '$bevitel3','$bevitel4')";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>