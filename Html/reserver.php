<?php
session_start();
// Checks user connection and trip parameters
if (!isset($_SESSION['client_name']) && !isset($_SESSION['horaire_id'])) {
  header('Location: client.php');
  die();
}
$client_id = $_SESSION["client_id"];
$horaire_id = $_SESSION["horaire_id"];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../Css/reserver_style.css">
  <title>SNCFT</title>
</head>

<body>
  <div id="container">
    <header>
      <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo"><span>Société nationale des chemins de
          fer tunisien</span></a>
      <div id="buttons">
        <p>Vous êtes connecté en tant que : <strong> <?php echo $_SESSION['client_name']; ?> </strong>
        </p>
        <a href="indexx.php">Deconnexion</a>
      </div>
    </header>
    <hr>
    <div id="info">
      <p>Réservation</p>
    </div>
  </div>
  <div id="page">
    <form id='main_form' action="../Php/calculate_reservation.php?horaire_id=$horaire_id&client_id=$client_id&train_id=$train_id" method="post">
      <!--Display Error -->
      <?php
      if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
      }
      ?>
      <!-- Display Form Selection -->
      <?php
      include "../Php/config.php";
      /* --------------------------- Profil du passager --------------------------- */
      echo '<label for="">Profil du passager:</label>';
      $req = mysql_query("select * from profil_passager");
      echo '<select name="passager_list" id="">';
      while ($donnes = mysql_fetch_array($req)) {
        $id = $donnes['id'];
        $x = $donnes['libelle'];
        $y4 = $donnes['prix'];
        echo "<option value='$id'>" . $x . " prix : " . $y4 . "</option>";
      }
      echo '</select>';

      /* ---------------------------------- Repas ---------------------------------- */
      echo '<label for="">Repas:</label>';
      $req = mysql_query("select * from repas");
      echo '<select name="repas_list" id="">';
      while ($donnes = mysql_fetch_array($req)) {
        $id = $donnes['id'];
        $x = $donnes['libelle'];
        $y0 = $donnes['prix'];

        echo "<option value='$id'>" . $x . " prix : " . $y0 . "</option>";
      }
      echo '</select>';

      /* ---------------------------------- Type de billet ---------------------------------- */
      echo '<label for="">Type de billet</label>';
      $req = mysql_query("select * from type_billet");
      echo '<select name="billet_list" id="">';
      while ($donnes = mysql_fetch_array($req)) {
        $id = $donnes['id'];
        $x = $donnes['libelle'];
        $y1 = $donnes['prix'];
        echo "<option value='$id'>" . $x . " prix : " . $y1 . "</option>";
      }
      echo '</select>';

      /* ---------------------------------- Classe de transport ---------------------------------- */
      echo '<label for="">Classe de transport:</label>';
      $req = mysql_query("select * from classe_de_transport");
      echo '<select name="classe_list" id="">';
      while ($donnes = mysql_fetch_array($req)) {
        $id = $donnes['id'];
        $x = $donnes['libelle'];
        $y2 = $donnes['prix'];
        echo "<option value='$id'>" . $x . " prix : " . $y2 . "</option>";
      }
      echo '</select>';

      /* ---------------------------------- Couchette ---------------------------------- */
      echo '<label for="">Couchette:</label>';
      $req = mysql_query("select * from Couchette");
      echo '<select name="couchette_list" id="">';
      while ($donnes = mysql_fetch_array($req)) {
        $id = $donnes['id'];
        $x = $donnes['libelle'];
        $y3 = $donnes['prix'];
        echo "<option value='$id'>" . $x . " prix : " . $y3 . "</option>";
      }
      echo '</select>';

      /* ---------------------------------- Train ---------------------------------- */
      $req = mysql_query("select type, prix, place, train_id from horaire, train
      where horaire.train_id = train.id
      and horaire.id = $horaire_id");
      $donnes = mysql_fetch_array($req);
      $train_id = $donnes["train_id"];
      $_SESSION["train_id"] = $train_id;
      $x = $donnes['type'];
      $y3 = $donnes['prix'];

      // Display place select
      echo '<label for="">Nombre de place à réserver:</label>';
      $place = $donnes['place'];
      echo '<select name="nb_place">';
      if ($place > 5) {
        for ($i = 1; $i < 6; $i++) {
          echo "<option value='$i'>" . $i . "</option>";
        }
      } else {
        for ($i = 1; $i < $place + 1; $i++) {
          echo "<option value='$i'>" . $i . "</option>";
        }
      }
      echo '</select>';
      
      echo "<label>Prix du billet de train : " . $y3 . " | Type : " .  $x . " | Nombre de place disponible : " . $place . "</label>";

      /* ---------------------------------- Promotion ---------------------------------- */
      $req = mysql_query("select montant from promotion");
      $donnes = mysql_fetch_array($req);
      $x = $donnes['montant'] * 100;
      echo "<label>Pourcentage de la promotion : " . $x . "%</label>";

      if ($place != 0) {
        echo '<button type="submit">Calculer</button>';
      }
      
      // Display price
      if (isset($_SESSION['prix_total'])) {
        $prix_total = $_SESSION['prix_total'];
        echo "<p>Le prix total : " . $prix_total . "</p>";
        echo '<a href="../Php/add_reservation.php">Réserver</a>';
      }
      ?>
    </form>
  </div>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>