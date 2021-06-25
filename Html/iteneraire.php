<?php
$dep = $_POST["list_dep"];
$arr = $_POST["list"];
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
    <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo"><span id='title'>Société nationale des chemins de fer tunisien</span></a>

    <div id="buttons">
      <a class='button-style' href="client.php">Retour</a>
    </div>
  </header>

  <div id="info">
    <!-- Show path -->
    <?php
    echo "<p style='margin-right: 6px;'>Gare de départ: <strong>$dep</strong> |</p>";
    echo "<p>Gare d'arrivé: <strong>$arr</strong></p>";
    ?>
  </div>
  <div id="page">

    <!-- Display horaire -->
    <div id="trajet">
      <table id="table">
        <tr>
          <th>Date</th>
          <th>Heure de départ</th>
          <th>Heure d'arrivé</th>
          <th>Numéro du train</th>
          <th>Numéro de la ligne</th>
          <th>Nombre de place disponible</th>
          <th>Réserver</th>
        </tr>

        <?php
        include '../Php/config.php';
        // Get ligne id
        $query = mysql_query("select * from ligne where dep = '$dep' and arr = '$arr'");
        $row = mysql_fetch_array($query);
        $ligne_id = $row["id"];

        // If date is set
        if (isset($_POST["date"]) && $_POST["date"] != "") {
          $date = $_POST["date"];
          $query = mysql_query("select * from horaire where date = '$date' and ligne_id = '$ligne_id'");
          // Get timetable of the trip
        } else {
          $query = mysql_query("select * from horaire where ligne_id = '$ligne_id'");
        }

        if (mysql_num_rows($query) == 0){

          echo "<p class='Error_msg'> Aucun trajet de prévu à cette date.</p>";
        }else {
          while ($rows = mysql_fetch_array($query)) {
            $horaire_id = $rows['id'];
            $date = $rows['date'];
            $dep = date('H:i', strtotime($rows['dep']));
            $arr = date('H:i', strtotime($rows['arr']));
            $train_id = $rows['train_id'];
            // Get train places
            $query_train = mysql_query("select place from train where id = '$train_id'");
            $row = mysql_fetch_array($query_train);
            $place = $row["place"];

            $ligne = $rows['ligne_id'];

            echo "<tr><td>" .
              $date .
              "</td><td>" .
              $dep .
              "</td><td>" .
              $arr .
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
        }
        
        ?>
    </div>

  </div>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>