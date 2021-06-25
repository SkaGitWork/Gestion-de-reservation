<?php
// error_reporting(0);
if (isset($_POST['id']) && isset($_POST['password'])) {
  if ($_POST['id'] == "10" && $_POST['password'] == "123"){
    header('Location: admin.php');
  }else {
    $error = "Erreur de connection";
  }
}
$GLOBALS
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="..Fonts/font.css">
  <link rel="stylesheet" href="..\Css\admin_connection_style.css" />
  <title>SNCFT</title>
</head>

<body>
  <div class="page">
    <header>
      <div>
        <a href="client.php"><img src="../Image/logo0.svg" alt="Logo" id="logo" />
        <h1 id="title">Société nationale des chemins de fer tunisien</h1></a>
      </div>
      <div>
        <a id="buttons" href="#" onclick="goBack()">Retour</a>
      </div>
    </header>
    <hr />
    <h1>Bienvenue</h1>
    <h2>Connection Administrateur</h2>

    <!-- Display Error -->
    <?php
    if (isset($error)) {
      echo "<h3 style='color: red; text-align: center;'>$error</h3>";
    }
    ?>

    <!-- Connection Admin -->
    <form method='post' action="admin_connection.php">
      <input name="id" type="text" placeholder="Identifiant" required/>
      <input name="password" type="password" placeholder="Mot de passe" value="" required/>
      <button type="submit">Connexion</button>
    </form>

  </div>

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
</body>

</html>