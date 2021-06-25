<?php

include 'config.php';
// error_reporting(0);

session_start();
// Assign variables
$prix = $_SESSION['prix_total'];
$client_id = $_SESSION['client_id'];
$horaire_id = $_SESSION['horaire_id'];
$train_id =  $_SESSION['train_id'];

$passager_list = $_SESSION['passager_list'];
$repas_list = $_SESSION['repas_list'];
$billet_list = $_SESSION['billet_list'];
$classe_list = $_SESSION['classe_list']  ;
$couchette_list = $_SESSION['couchette_list'];
$nb_place = $_SESSION['nb_place'];

// Get current promotion id
$query = mysql_query("select id from promotion where actif = 1") or die("Erreur0");
$row = mysql_fetch_array($query);
$promotion_id = $row["id"];

// Insert into Reservation
$requete = "insert into reservation (id_client, prix, profil, classe, repas, couchette, id_horaire, type_billet, promotion_id, nb_place)  VALUES ($client_id, $prix, $passager_list, $classe_list, $repas_list, $couchette_list, $horaire_id, $billet_list, $promotion_id, $nb_place)";


$query = mysql_query($requete) or die("Erreur1");

// Substract places
$query = mysql_query("update train set place = place - $nb_place where id = $train_id") or die("Erreur place");

header("Location: ../Html/client.php");

// // Get Reservation id
// $requete = "select id from reservation where id_horaire = $horaire_id";
// $query = mysql_query($requete)or die("Erreur2");
// $row = mysql_fetch_array($query);
// $reservation_id = $row['id'];

// // Check if the client have the same reservation twice
// $query = mysql_query("select id_reservation from client_reservation where id_client = $client_id")or die("Erreur");
// if (mysql_num_rows($query) > 0) {
//     $_SESSION['error'] = "<p style = color:red;>Reservation déjà faite</p>";
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// }else {
//     // Insert into client_reservation
//     $requete = "insert into client_reservation (id_client, id_reservation) VALUES ($client_id, $reservation_id)";
//     $query = mysql_query($requete)or die("Erreur3");
// }
// Unset
unset($_SESSION['prix_total']);
unset($_SESSION['client_id']);
unset($_SESSION['client_name']);
unset($_SESSION['horaire_id']);
unset($_SESSION['train_id']);


mysql_close();

