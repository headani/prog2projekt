 <?php
session_start(); 
include "kapcsolat.php";
$felhasznalonev=$_POST["felhasznalonev"];
$jelszo=md5($_POST["jelszo"]);

$sql = "SELECT felhasznalo_id,felhasznalo_nev,felhasznalo_rang FROM felhasznalo where felhasznalo_nev='$felhasznalonev' and felhasznalo_jelszo='$jelszo'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($result); 
    //echo "nev: " . $row["felhasznalo_nev"]. " - rang: " . $row["felhasznalo_rang"]. "<br>";
    $_SESSION["loginid"]=$row["felhasznalo_id"];
    $_SESSION["loginnev"]=$row["felhasznalo_nev"];
    $_SESSION["loginrang"]=$row["felhasznalo_rang"];
	echo 1; 
} else {
    echo 0;
}

mysqli_close($conn);
?> 