<?php

include 'config.php';
// error_reporting(0);

$dep = $_POST["dep"];
$arr = $_POST["arr"];


$query = mysql_query("insert into ligne (dep, arr) value ('$dep', '$arr')") or die ("erreur");

header("Location: ../Html/ligne.php");

mysql_close();
