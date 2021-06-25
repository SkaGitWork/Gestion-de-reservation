<?php
session_start();
$client_id = $_SESSION["client_id"];
$client_name = $_SESSION['client_name'];
unset($_SESSION['vers']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../Css/display_reservation_style.css">
  <title>SNCFT</title>
</head>

<body>
  <div id="page">
    <!-- Header -->
    <header>
      <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo"><span>Société nationale des chemins de fer tunisien</span></a>

      <div id="buttons">
        <p>Vous êtes connecté en tant que : <strong><?php echo $client_name; ?></strong></p>
        <a href="client.php">Deconnexion</a>
      </div>
    </header>

<hr>
    <div id="info">
      <h3>Vos réservations</h3>
    </div>

    <!-- Display horaire -->
      <table id="table">
        <tr>
          <th>Numéro de la réservation</th>
          <th>Date</th>
          <th>Heure de départ</th>
          <th>Heure d'arrivé</th>
          <th>Numéro du train</th>
          <th>Gare de départ</th>
          <th>Gare de destination</th>
          <th>Prix</th>
          <th>Nombre de place réserver</th>
          <!-- <th>Plus de détail</th> -->
        </tr>

        <?php
        include '../Php/config.php';
        // Get Reservation Information
        $sql_query = "select reservation.id as id, date, horaire.dep AS h_d, horaire.arr as h_a, horaire.train_id, ligne.dep, ligne.arr, prix, nb_place FROM reservation, horaire, ligne 
          WHERE id_horaire = horaire.id 
          and horaire.ligne_id = ligne.id 
          and reservation.id_client = $client_id";

        $query = mysql_query($sql_query) or die("Erreur big");
        while ($rows = mysql_fetch_array($query)) {

          $reservation_id = $rows['id'];
          $date = $rows['date'];
          $dep = date('H:i', strtotime($rows['h_d']));
          $arr = date('H:i', strtotime($rows['h_a']));
          $train = $rows['train_id'];
          $ligne_dep = $rows['dep'];
          $ligne_arr = $rows['arr'];
          $prix = $rows['prix'];
          $nb_place = $rows['nb_place'];
          echo "<tr><td>" .
            $reservation_id .
            "</td><td>" .
            $date .
            "</td><td>" .
            $dep .
            "</td><td>" .
            $arr .
            "</td><td>" .
            $train .
            "</td><td>" .
            $ligne_dep .
            "</td><td>" .
            $ligne_arr .
            "</td><td>" .
            $prix .
            "</td><td>" .
            $nb_place .
            "</td></tr>";
          // "<a href='indexx.php?horaire_id=$horaire_id&train_id=$train_id'>Détail</a>".
        }
        ?>

  </div>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>