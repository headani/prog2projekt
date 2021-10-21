<?php 
include "../../alap/kapcsolat.php";
$sql = "SELECT * FROM esemeny 
INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
WHERE zartkoru=0
ORDER BY esemeny_datum asc";
$result = mysqli_query($conn, $sql);
/*
INNER JOIN jegyek ON esemeny.esemeny_id=jegyek.esemeny_id
GROUP BY jegyek.esemeny_id
*/

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