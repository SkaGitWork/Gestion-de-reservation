<?php

include 'config.php';
// error_reporting(0);

$libelle = $_POST["libelle"];
$montant = $_POST["montant"];


$query = mysql_query("insert into promotion (libelle, montant) value ('$libelle', '$montant')") or die ("erreur");

header("Location: ../Html/promotion.php");

mysql_close();
