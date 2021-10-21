<?php 
include "../../alap/kapcsolat.php";
$data = json_decode(file_get_contents("php://input"));
$bevitel1=$data->esemeny_id;
//$bevitel1=$_POST["film_id"];

//torles a vasarlobol


//torles az eladottbol

$sql = "DELETE FROM eladott WHERE eladott_jegyek_id IN (select jegyek_id from jegyek where esemeny_id=$bevitel1)";
$result=mysqli_query($conn, $sql);

//torles a jegyekbol
$sql = "DELETE FROM jegyek WHERE esemeny_id=$bevitel1";
$result=mysqli_query($conn, $sql);


//torles az esemenybol
$sql = "DELETE FROM esemeny where esemeny_id=$bevitel1";
$result=mysqli_query($conn, $sql);






/*
DELETE jegyek,esemeny
FROM jegyek
INNER JOIN esemeny ON jegyek.esemeny_id = esemeny.esemeny_id
INNER JOIN eladott ON jegyek.jegyek_id = eladott.eladott_jegyek_id
WHERE esemeny_id=4;
*/

// DELETE jegyek , esemeny  FROM jegyek  INNER JOIN esemeny  WHERE jegyek.esemeny_id=esemeny.esemeny_id and esemeny.esemeny_id = '4'






if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($conn);
?>