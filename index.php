<?php session_start();?>
 <!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="UTF-8">

<title>DebrecenTickets</title>
<link rel="shortcut icon" href="kepek/jegy.png" />

<base href="http://localhost/tanulo/pappdaniel_2021_11_11/">

 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

<script src="alap/alap.js"></script> 

<link href="https://fonts.googleapis.com/css?family=Faster+One|Grenze|Playfair+Display&display=swap" rel="stylesheet"> 

<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/alap.css">


</head>
<body>


<?php 
	if (isset($_SESSION["loginnev"]))
		require "alap/menu_belepett.php";
	else
		require "alap/menu_nembelepett.html";

?>



<div class="row">

<div class="col-sm-1">
</div>
<div class="col-sm-10 ">
<?php
	$page = isset($_GET['page']) ? $_GET['page'] : "kereses";
	if($page == "") $page = "kereses";
	
	if(file_exists("pages/" . $page . "/" . $page . ".php"))
		include "pages/" . $page . "/" . $page . ".php";
	else
		include '404.php';
?>
</div>
<div class="col-sm-1">
</div>
</div>


</body>
</html> 