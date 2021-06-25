<?php

include 'config.php';
// error_reporting(0);

$id = $_POST["id"];
$place = $_POST["place"];
$prix = $_POST["prix"];
$type = $_POST["type"];

$query = mysql_query("update train set place = $place, prix = $prix, type = '$type' where id = $id") or die ("erreur");

header("Location: ../Html/train.php");

mysql_close();
