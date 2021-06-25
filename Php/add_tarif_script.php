<?php

include 'config.php';
// error_reporting(0);
session_start();

$table = $_SESSION['table'];

$libelle = $_POST["libelle"];
$prix = $_POST["prix"];

$query = mysql_query("insert into $table (libelle, prix) value ('$libelle', $prix)") or die ("erreur");

header("Location: ../Html/tarif.php");

mysql_close();
