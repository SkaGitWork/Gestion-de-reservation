<?php

include 'config.php';
// error_reporting(0);

$place = $_POST["place"];
$prix = $_POST["prix"];
$type = $_POST["type"];


$query = mysql_query("insert into train (place, prix, type) value ('$place', '$prix', '$type')") or die ("Erreur");

header("Location: ../Html/train.php");

mysql_close();
