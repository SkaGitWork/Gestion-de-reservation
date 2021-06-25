<?php

require "config.php";
// error_reporting(E_ALL ^ E_DEPRECATED);

session_start();

$button = $_POST["button"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$password = $_POST["password"];
$id = $_POST["id"];

$error = "Erreur de connection. Veuillez réessayer";
$error2 = "Erreur d'inscription. Compte déjà existant";


switch ($button) {
    /* ---------------------------- Connection Client --------------------------- */
  case 'client':
    $req = mysql_query("select * from client where email = '$email' and mdp = '$password'");
    // If account found
    if (mysql_num_rows($req) != 0) {

      // Get user ID and NAME
      $row = mysql_fetch_array($req);
      $client_id = $row['id'];
      $client_name = $row['nom'];

      // Redirect to DISPLAY RESERVATION
      if (isset($_GET["vers"])) {
        $_SESSION['client_name'] = $client_name;
        $_SESSION['client_id'] = $client_id;
        unset($_SESSION["vers"]);
        header("Location: ../Html/display_reservation.php?");

        // Redirect to RESERVER
      } else {
        $_SESSION['client_name'] = $client_name;
        $_SESSION['client_id'] = $client_id;
        unset($_SESSION['prix_total']);
        header("Location: ../Html/reserver.php?");
      }
      // Display error
    } else {
      $_SESSION["error"] = $error;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    break;

    /* -------------------------- Inscription CLient -------------------------- */
  case 'sign_up':
    // Check if account exists
    $req = mysql_query("select email, mdp from client where email = '$email' and mdp = '$password'");
    if (mysql_num_rows($req) == 0) {

      // Insert new account
      mysql_query("insert into client (nom, prenom, email, mdp) values ('$nom', '$prenom', '$email', '$password')") or die("Erreur-Creation de compte");

      // Redirect to LOGIN PAGE
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      break;

      // Display error
    } else {
      $_SESSION["error"] = $error2;
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
mysql_close();
