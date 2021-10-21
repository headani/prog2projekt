<?php 
include "../../alap/kapcsolat.php";
$bevitel1=$_POST["bevitel1"];
$bevitel2=$_POST["bevitel2"];
$bevitel3=$_POST["bevitel3"];

if ($bevitel1=="")
{
	if($bevitel2=="1")
	{
		if($bevitel3=="")
		{
			$sql = "SELECT * FROM esemeny 
			INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
			INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
			WHERE tipus.tipus_id=6 AND zartkoru=0
			ORDER BY esemeny_datum ASC  ";
		}
		else
		$sql = "SELECT * FROM esemeny 
		INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
		INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
		WHERE esemeny_datum='$bevitel3' AND tipus_id=6 AND zartkoru=0
		ORDER BY esemeny_datum ASC";
		
	}
	else
	{
	
	if($bevitel3=="")
	{
		$sql = "SELECT * FROM esemeny 
		INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
		INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
		WHERE helyszin_id='$bevitel2' AND tipus.tipus_id=6 AND zartkoru=0
		ORDER BY esemeny_datum ASC";
	}
	else
	{
		$sql = "SELECT * FROM esemeny 
		INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
		INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
		WHERE helyszin_id='$bevitel2' AND esemeny_datum='$bevitel3' AND tipus.tipus_id=6 AND zartkoru=0
		ORDER BY esemeny_datum ASC";
	}
	}
}
else
{
	if($bevitel2=="1")
	{
		if($bevitel3=="")
		{
			$sql = "SELECT * FROM esemeny 
			INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
			INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
			WHERE esemeny_nev like '%$bevitel1%' AND tipus_id=6 AND zartkoru=0
			ORDER BY esemeny_datum ASC";
		}
		else
		{
			$sql = "SELECT * FROM esemeny 
			INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
			INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
			WHERE esemeny_datum='$bevitel3' AND esemeny_nev like '%$bevitel1%' AND tipus_id=6 AND zartkoru=0
			ORDER BY esemeny_datum ASC";
		}	
	}
	else
	{
		if($bevitel3=="")
		{
		$sql = "SELECT * FROM esemeny 
		INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
		INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
		WHERE esemeny_nev like '%$bevitel1%' AND helyszin_id='$bevitel2' AND tipus_id=6 AND zartkoru=0
		ORDER BY esemeny_datum ASC";	
		}	
		else
		{
			$sql = "SELECT * FROM esemeny 
			INNER JOIN helyszin ON esemeny_helyszin_id=helyszin_id 
			INNER JOIN tipus ON esemeny.esemeny_tipus_id=tipus.tipus_id
			WHERE esemeny_nev like '%$bevitel1%' AND helyszin_id='$bevitel2'  AND esemeny_datum='$bevitel3' AND tipus_id=6 AND zartkoru=0 
			ORDER BY esemeny_datum ASC";
		}
	}
	
}

	
	

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