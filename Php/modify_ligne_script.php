<?php

include '../Php/config.php';
// error_reporting(0);

$dep = $_POST["dep"];
$arr = $_POST["arr"];
$id = $_POST["id"];

$query = mysql_query("update ligne set arr = '$arr', dep = '$dep' where id = $id") or die ("erreur");

header("Location: ../Html/ligne.php");

mysql_close();
