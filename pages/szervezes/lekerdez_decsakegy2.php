<?php 
include "../../alap/kapcsolat.php";

$bevitel1=$_POST["bevitel1"];


/*if()
{
$sql = "update jegyek set jegyek_darab=jegyek_darab-1 where jegyek_id=$bevitel1";
$result = mysqli_query($conn, $sql);
}
*/


$sql = "SELECT * FROM jegyek
INNER JOIN esemeny ON esemeny.esemeny_id=jegyek.esemeny_id
WHERE esemeny.esemeny_id=$bevitel1";

//$sql = "SELECT * FROM esemeny INNER JOIN jegyek ON esemeny_id=esemeny_id WHERE esemeny_id=$bevitel1";
$result = mysqli_query($conn, $sql);

$kimenet=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["film_id"]. " - Name: " . $row["film_cim"]. " " . $row["film_ev"]. "<br>";
		array_push($kimenet,$row);
	}
	echo json_encode($kimenet);
} else {
    echo 0;
}

mysqli_close($conn);
?>