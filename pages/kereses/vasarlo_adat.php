<?php
session_start();
$_SESSION["vasarlo_nev"]=$_POST["bevitel3"];
$_SESSION["vasarlo_lakcim"]=$_POST["bevitel4"];


echo($_SESSION["vasarlo_nev"]);
echo($_SESSION["vasarlo_lakcim"]);


?>