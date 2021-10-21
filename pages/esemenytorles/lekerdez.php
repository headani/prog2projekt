<?php 

session_start();

$login_id=$_SESSION["loginid"];



include "../../alap/kapcsolat.php";

$sql = "SELECT * FROM esemeny 
INNER JOIN helyszin ON esemeny.esemeny_helyszin_id=helyszin.helyszin_id 
WHERE szervezo_id=$login_id";
/* 
INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id */
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