<?php
error_reporting(0);
session_start();

// Check trip parameters
if (!isset($_GET['horaire_id']) && !isset($_GET['vers'])) {
  header('Location: client.php');
  die();}

$_SESSION["horaire_id"] = $_GET["horaire_id"];

// Switch next page
if (isset($_GET['vers'])) {
  $vers = "?vers=true";  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="..Fonts/font.css">
  <link rel="stylesheet" href="..\Css\index_style.css" />
  <title>SNCFT</title>
</head>

<body>
  <div class="page">
    <header>
      <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo" />
        <h1 id="title">Société nationale des chemins de fer tunisien</h1>
      </a>
      <div id="buttons">
        <a href="#" onclick="goBack()">Retour</a>
      </div>
    </header>
    <hr />
    <h1>Bienvenue</h1>
    <?php
    if (isset($_SESSION["error"])) {
      $error = $_SESSION["error"];
      echo "<h2 style='color: red; text-align: center;'>$error</h2>";
    }
    ?>
    <section>
      <!-- /* ---------------------------------- Login --------------------------------- */ -->
      <article id="a1">
        <div class="menu">
          <a href="#" id="button-1" onmousedown="show('client-connection')">
            <h3>Connectez vous</h3>
          </a>
        </div>
      </article>

      <hr/>

      <!-- /* --------------------------------- Sign up -------------------------------- */ -->
      <article id="a2">
        <div class="menu">
          <a href="#" id="button-3" onmousedown="show('client-sign-up')">
            <h3>Inscrivez vous</h3>
          </a>
        </div>

        <!-- /* ---------------------------- Connection Client --------------------------- */ -->
      </article>
      <?php
      echo "<form method='post' action='../Php/connection.php . $vers' id='client-connection'>";
      ?>

      <input name="email" type="email" placeholder="Adresse e-mail" value="aa@mm.cc" required />

      <input name="password" type="password" placeholder="Mot de passe" value="" required />
      <button type="submit" name="button" value="client">Connexion</button>
      </form>

      <!-- /* --------------------------- Inscription CLient --------------------------- */ -->
      <form method="post" action="../Php/connection.php" id="client-sign-up" onsubmit="return check()">

        <input id="nom" name="nom" type="text" placeholder="Nom" value="" required pattern="[A-Za-z]+" />
        <input id="prenom" name="prenom" type="text" placeholder="Prenom" value="" required pattern="[A-Za-z]+" />
        <input name="email" type="email" placeholder="Adresse e-mail" value="" required />
        <input id="password" name="password" type="password" placeholder="Mot de passe" value="" required />
        <input id="passwordc" name="c_password" type="password" placeholder="Confirmer le mot de passe" value="" required />
        <span id="error"></span>

        <button type="submit" name="button" value="sign_up">Valider</button>

      </form>
    </section>
  </div>
  <script src="../Js/index_app.js"></script>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>

<?php
unset($_SESSION["error"]);
?>