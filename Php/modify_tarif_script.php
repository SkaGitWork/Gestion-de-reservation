<?php

include '../Php/config.php';
// error_reporting(0);

$table = $_POST["table"];
$libelle = $_POST["libelle"];
$prix = $_POST["prix"];
$id = $_POST["id"];

$query = mysql_query("update $table set libelle = '$libelle', prix = '$prix' where id = $id") or die ("erreur");

header("Location: ../Html/tarif.php");

mysql_close();
