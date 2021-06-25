<?php
if (!isset($_POST["num_train"])) {
  header('Location: client.php');
  die();
}

$train_id = $_POST["num_train"];
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
    <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo"><span id='title'>Société Nationale Des Chemins De Fer Tunisien</span></a>

    <a class='button-style' href="client.php">Retour</a>
  </header>

  <div id="info">
    <!-- Show path -->
    <?php
    echo "<p>Numéro du train : <strong>$train_id</strong></p>";
    ?>
  </div>
  <div id="page">

    <!-- Display horaire -->
    <table>
      <tr>
        <th>Date</th>
        <th>Heure de départ</th>
        <th>Heure d'arrivé</th>
        <th>Gare de départ</th>
        <th>Gare d'arrivé</th>
        <th>Numéro de la ligne</th>
        <th>Nombre de place disponible</th>
        <th>Réserver</th>
      </tr>

      <?php
      include '../Php/config.php';
      // Get timetable of the trip
      $query_text = "select horaire.id, date, horaire.dep, horaire.arr, ligne_id, place, ligne.arr as l_arr, ligne.dep as l_dep
        from horaire, ligne, train 
        where horaire.ligne_id = ligne.id
        and horaire.train_id = train.id
        and train.id = '$train_id'";

      // If date is set, add it to the query
      if ($_POST["date"] != "") {
        $date = $_POST["date"];
        $query_text .= "and horaire.date = $date";
      }

      $query = mysql_query($query_text);
      if (mysql_num_rows($query) == 0) {

        echo "<p class='Error_msg'> Aucun trajet de prévu à cette date.</p>";
      } else {

        while ($row = mysql_fetch_array($query)) {
          $date = $row['date'];
          $dep = date('H:i', strtotime($row['dep']));
          $arr = date('H:i', strtotime($row['arr']));
          $l_dep = $row['l_dep'];
          $l_arr = $row['l_arr'];
          $horaire_id = $row['id'];
          $ligne_id = $row['ligne_id'];
          $place = $row['place'];

          echo "<tr><td>" .
            $date .
            "</td><td>" .
            $dep .
            "</td><td>" .
            $arr .
            "</td><td>" .
            $l_dep .
            "</td><td>" .
            $l_arr .
            "</td><td>" .
            $ligne_id .
            "</td><td>" .
            $place .
            "</td><td>" ;
            if ($place == 0) {
            echo "<span style='color:red'>Complet</span>" .
            "</td></tr>";
            }else {
              echo "<a href='indexx.php?horaire_id=$horaire_id'>Réserver</a>" .
            "</td></tr>";
            }
            
            
        }
        mysql_close();
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