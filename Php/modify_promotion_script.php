<?php

include 'config.php';
// error_reporting(0);


$libelle = $_POST["libelle"];
$montant = $_POST["montant"];
$id = $_POST["id"];

$query = mysql_query("update promotion set libelle = '$libelle', montant = '$montant' where id = $id") or die ("erreur");

header("Location: ../Html/promotion.php");

mysql_close();
