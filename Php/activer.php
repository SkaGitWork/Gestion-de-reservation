<?php

include 'config.php';

$id = $_GET['id'];
$query = mysql_query("update promotion set actif = 0") or die("Erreur1");

$query = mysql_query("update promotion set actif = 1 where id = $id") or die("Erreur2");

header("Location: ../Html/promotion.php");


mysql_close();

?>