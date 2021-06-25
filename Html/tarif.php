<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/admin_subpages.css">
  <title>SNCFT Admin</title>
  <style>
    ul {
      width: 60%;
      margin: auto;
      display: flex;
      justify-content: space-around;
    }

    li {
      list-style: none;
    }
    
    li a {
      font-family: "kohoregular";
      background-color: #0074cb;
      border-radius: 20px;
      box-shadow: 3px 3px 5px rgb(139, 139, 139);
      padding: 7px 10px;
      display: block;
      text-decoration: none;
      color: white;
      font-size: 1.5em;
    }

    h2 {
      font-family: "kohoregular";
    }
  </style>
</head>

<body>

  <header>
    <div id="all_logo">
      <img src="../Image/logo0.svg" alt="Logo" id="logo">
      <span id='title'>SNCFT</span>
    </div>
    <h1>Bienvenue dans le menu de gestion</h1>
    <div id='redirection'>
      <a class="button_style" href="../Html/admin.php">Retour</a>
    </div>
  </header>
  <hr>

  <!-- Display table name -->
  <?php
  session_start();
  if (isset($_SESSION["table"])) {

    echo '<h2>Table selectionée : ' . $_SESSION["clean_name"] . '</h2>';
  } else {
    echo '<h2>Table selectionée : </h2>';
  }
  ?>

  <!--5 Button list -->
  <ul>
    <li><a href="../Php/display_script.php?table=classe_de_transport">Classe de transport</a></li>
    <li><a href="../Php/display_script.php?table=couchette">Couchette</a></li>
    <li><a href="../Php/display_script.php?table=repas">Repas</a></li>
    <li><a href="../Php/display_script.php?table=type_billet">Type de billet</a></li>
    <li><a href="../Php/display_script.php?table=profil_passager">Profil de passager</a></li>
  </ul>


  <!-- Form -->
  <?php
  if (isset($_SESSION['table'])) {
    echo ' <form id="add_form" action="../Php/add_tarif_script.php" method="post">
    <label for="">Libéllé :</label>
    <input name="libelle" value="" type="text" placeholder="Libéllé" required>

    <label for="">Prix :</label>
    <input name="prix" value="" type="number" placeholder="prix" required>

    <button type="submit" class="button_style">Enregistrer</button>
  </form>';
  }
  ?>

  <div id="forms">
    <!--Display table Database-->
    <?php
    if (isset($_SESSION["table"])) {
      $table =  $_SESSION["table"];
      $data = '<form action="../Php/delete_tarif_script.php?table=' . $table . '" method="post" id="display_form">
        <table id="table">
          <tr>
            <th>Id</th>
            <th>Libéllé</th>
            <th>Prix</th>
            <th>Supprimer</th>
            <th>Modifier</th>
          </tr>';
      include '../Php/config.php';


      echo $data;
      $query = mysql_query("select * from $table");
      $i = 0;
      while ($row = mysql_fetch_array($query)) {
        $id = $row['id'];
        $libelle = $row['libelle'];
        $prix = $row['prix'];
        $i++;
        echo "<tr><td>" .
          $id .
          "</td><td>" .
          $libelle .
          "</td><td>" .
          $prix .
          "</td><td>" .
          "<input type='checkbox' value='$id' name='check$i'>
            </td><td>";
        $libelle = str_replace(" ", "_", $libelle);
        $value = "'$libelle'," . "'$prix'," . "$id";

        echo "<a href='#' onclick=show($value) value='$id'>Modifier</a>" .
          "</td></tr>";
      }
      echo '</table>
        <button class="button_style" type="submit">Supprimer</button>';
    }
    ?>

    </form>

    <!--Hidden form for modify-->
    <form id="modify_form" action="../Php/modify_tarif_script.php" method="post">

      <!-- Hidden post -->
      <input id="id" name="id" type="text" value="" hidden>
      <input name="table" type="text" value="<?php echo $_SESSION["table"]; ?>" hidden>
      <!-- Hidden post -->

      <h2>Modification</h2>
      <label>Libellé :</label>
      <input id="libelle" name="libelle" value="" type="text" placeholder="Libellé" required> <br>

      <label>Prix :</label>
      <input id="prix" name="prix" value="" type="number" placeholder="Prix" required> <br>

      <button type="submit">Valider</button>
    </form>

  </div>

  <script>
    // Display and hide second form
    modify_form = document.getElementById("modify_form");
    add_form = document.getElementById("add_form");
    table_name = document.getElementById("table_name");
    modify_form.style.display = "none"

    // Show modify form
    function show(libelle, prix, id) {
      if (modify_form.style.display == "none") {
        modify_form.style.display = 'flex';
      } else {
        modify_form.style.display = 'none';
      }
      document.getElementById("libelle").value = libelle;
      document.getElementById("prix").value = prix;
      document.getElementById("id").value = id;

    }
  </script>
</body>

</html>