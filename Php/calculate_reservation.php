<?php

include 'config.php';
// error_reporting(0);
session_start();
$client_id = $_SESSION['client_id'];
$horaire_id = $_SESSION['horaire_id'];
$train_id = $_SESSION['train_id'];
$client_name = $_SESSION['client_name'];

$passager_list = $_POST["passager_list"];
$repas_list = $_POST["repas_list"];
$billet_list = $_POST["billet_list"];
$classe_list = $_POST["classe_list"];
$couchette_list = $_POST["couchette_list"];
$nb_place = $_POST["nb_place"];

$_SESSION['passager_list'] = $passager_list;
$_SESSION['repas_list'] = $repas_list;
$_SESSION['billet_list'] = $billet_list;
$_SESSION['classe_list'] = $classe_list ;
$_SESSION['couchette_list'] = $couchette_list;
$_SESSION['nb_place'] = $nb_place;


$prix = 0;
// Get prix
/* ----------------------------- Profil passager ---------------------------- */

$query = mysql_query("select prix from profil_passager where id = '$passager_list'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

/* ----------------------------------- Classe de transport------------------------------------------- */
$query = mysql_query("select prix from classe_de_transport where id = '$classe_list'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

/* ----------------------------------- Table Repas ---------------------------------- */
$query = mysql_query("select prix from repas where id = '$repas_list'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

/* ----------------------------------- Table Couchette ---------------------------------- */
$query = mysql_query("select prix from couchette where id = '$couchette_list'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

/* ----------------------------------- Table Type_billet ---------------------------------- */
$query = mysql_query("select prix from type_billet where id = '$billet_list'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

/* ----------------------------------- Table Train ---------------------------------- */
$query = mysql_query("select prix from train where id = '$train_id'");
$row = mysql_fetch_array($query);
$prix += $row["prix"];

// Get promotion montant
$query = mysql_query("select id, montant from promotion where actif = 1");
$row = mysql_fetch_array($query);
$_SESSION['promotion_id'] = $montant = $row["montant"];
$_SESSION['montant'] = $id = $row["id"];

// Aplly promotion
$prix *= (1-$montant);

$_SESSION['prix_total'] = $prix;
mysql_close();
header("Location: ../Html/reserver.php?id=$client_id&name=$client_name&horaire_id=$horaire_id&train_id=$train_id");

