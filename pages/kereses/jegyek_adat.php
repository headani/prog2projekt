<?php
session_start();
$_SESSION["eladott_jegyek_id"]=$_POST["bevitel1"];
$_SESSION["eladott_jegyek_db"]=$_POST["bevitel2"];


echo($_SESSION["eladott_jegyek_id"]);
echo($_SESSION["eladott_jegyek_db"]);


?>