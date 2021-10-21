<?php 
include "../../alap/kapcsolat.php";

$sql = "SELECT * FROM helyszin ";
$result = mysqli_query($conn, $sql);

$kimenet=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		array_push($kimenet,$row);
	
	}
	echo json_encode($kimenet);
} else {
    echo 0;
}

mysqli_close($conn);
?>