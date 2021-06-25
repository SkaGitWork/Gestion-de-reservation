<?php
if (!isset($_POST["horaire_list"])) {
  header('Location: client.php');
  die();
}

$dep = $_POST["horaire_list"];
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../Css/display_table_style.css">
  <title>SNCFT</title>
</head>

<body>

  <!-- Header -->
  <header>
    <a href="client.php"><img src="../Image/logo0.svg" id="logo"><span id='title'>Société Nationale Des Chemins de Fer Tunisien</span></a>
    <div id="buttons">
      <a class='button-style' href="client.php">Retour</a>
    </div>
  </header>

  <div id="info">
    <!-- Show path -->
    <?php
    echo "<p>Gare de départ: <strong>$dep</strong></^^>";
    ?>
  </div>
  <div id="page">

    <!-- Display horaire -->
    <table id="table">
      <tr>
        <th>Date</th>
        <th>Heure de départ</th>
        <th>Heure d'arrivé</th>
        <th>Gare d'arrivé</th>
        <th>Numéro du train</th>
        <th>Numéro de la ligne</th>
        <th>Nombre de place disponible</th>
        <th>Réserver</th>
      </tr>

      <?php
      include '../Php/config.php';
      // Get timetable of the trip
      $query = mysql_query("select horaire.id, date, horaire.dep as h_dep, horaire.arr as h_arr, train_id, ligne_id, ligne.arr as l_arr
         from horaire, ligne 
        where horaire.ligne_id = ligne.id
        and ligne.dep = '$dep'");
      while ($row = mysql_fetch_array($query)) {
        $horaire_id = $row['id'];
        $date = $row['date'];
        $dep = date('H:i', strtotime($row['h_dep']));
        $arr = date('H:i', strtotime($row['h_arr']));
        $l_arr = $row['l_arr'];
        $ligne = $row['ligne_id'];
        $train_id = $row['train_id'];
        // Get train places
        $query_train = mysql_query("select place from train where id = '$train_id'");
        $row_train = mysql_fetch_array($query_train);
        $place = $row_train["place"];


        echo "<tr><td>" .
          $date .
          "</td><td>" .
          $dep .
          "</td><td>" .
          $arr .
          "</td><td>" .
          $l_arr .
          "</td><td>" .
          $train_id .
          "</td><td>" .
          $ligne .
          "</td><td>" .
        $place .
          "</td><td>";
        if ($place == 0) {
          echo "<span style='color:red'>Complet</span>" .
          "</td></tr>";
        } else {
          echo "<a href='indexx.php?horaire_id=$horaire_id'>Réserver</a>" .
          "</td></tr>";
        }
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