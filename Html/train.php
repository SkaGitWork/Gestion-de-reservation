<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/admin_subpages.css">
  <title>SNCFT Admin</title>
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

  <form id="add_form" action="../Php/add_train_script.php" method="post">
    <label for="">Nombre de place :</label>
    <input name="place" type="number" placeholder="Nombre de place" required>

    <label for="">Prix du billet :</label>
    <input name="prix" type="number" placeholder="prix" required>

    <label for="">Type de train :</label>
    <input name="type" type="text" placeholder="Type de train" required pattern="[A-Z][A-Za-z]+">

    <button class='button_style' type="submit">Enregistrer</button>
  </form>

  <div id="forms">
    <!--Display table Database-->
    <form action="../Php/delete_ligne_script.php?table=train" method="post" id='add_form'>
      <table id="table">
        <tr>
          <th>Id</th>
          <th>Nombre de place</th>
          <th>Prix</th>
          <th>Type</th>
          <th>Supprimer</th>
          <th>Modifier</th>
        </tr>
        <?php
        include '../Php/config.php';
        $query = mysql_query("select * from train");
        $i = 0;
        while ($row = mysql_fetch_array($query)) {
          $id = $row['id'];
          $place = $row['place'];
          $prix = $row['prix'];
          $type = $row['type'];
          $value = "'$place'," . "'$prix'," . "'$type'," . "$id";
          $i++;
          echo "<tr><td>" .
            $id .
            "</td><td>" .
            $place .
            "</td><td>" .
            $prix .
            "</td><td>" .
            $type .
            "</td><td>" .
            "<input type='checkbox' value='$id' name='check$i'>
          </td><td>" .
            "<a href='#' onclick=show($value) value='$id'>Modifier</a>" .
            "</td></tr>";
        }
        ?>

      </table>
      <button class='button_style' type="submit">Supprimer</button>

    </form>

    <!--Hidden form for modify-->
    <form id="modify_form" action="../Php/modify_train_script.php" method="post">
      <h2>Modification</h2>
      <input id="id" name="id" type="text" value="" hidden>

      <label>Nombre de place :</label>
      <input id="place" name="place" value="" type="number" placeholder="Nombre de place" required> <br>

      <label>Prix du billet :</label>
      <input id="prix" name="prix" value="" type="number" placeholder="Prix du billet" required> <br>

      <label>Type de train :</label>
      <input id="type" name="type" value="" type="text" placeholder="Type de train" required pattern="[A-Za-z][A-Za-z]+">
      <button class='button_style' type="submit">Valider</button>
    </form>

  </div>

  <script>
    // Display and hide second form
    x = document.getElementById("modify_form");
    x.style.display = "none"

    function show(place, prix, type, id) {
      if (x.style.display == "none") {
        x.style.display = 'flex';
      } else {
        x.style.display = 'none';
      }
      document.getElementById("place").value = place;
      document.getElementById("prix").value = prix;
      document.getElementById("type").value = type;
      document.getElementById("id").value = id;
    }
  </script>
</body>

</html>