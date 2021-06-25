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
      <span id="title">SNCFT</span>
    </div>
    <h1>Bienvenue dans le menu de gestion</h1>
    <div id='redirection'>
      <a class="button_style" href="../Html/admin.php">Retour</a>
    </div>
  </header>
  <hr>
<!-- /* -------------------------------- Add form -------------------------------- */ -->
  <form id="add_form" action="../Php/add_ligne_script.php" method="post">
    <label for="t">Gare de départ :</label>
    <input name="dep" type="text" placeholder="Gare de départ" required pattern="[A-Z][A-Za-z]+">
    <label for="">Gare de destination :</label>
    <input name="arr" type="text" placeholder="Gare de destination" required pattern="[A-Z][A-Za-z]+">
    <button class='button_style' type="submit">Enregistrer</button>
  </form>

  <div id="forms">
    <!--Display table Database-->
    <form action="../Php/delete_ligne_script.php" method="post">
      <table>
        <tr>
          <th>Id</th>
          <th>Gare de départ</th>
          <th>Gare de destination</th>
          <th>Supprimer</th>
          <th>Modifier</th>
        </tr>
        <?php
        include '../Php/config.php';
        $query = mysql_query("select * from ligne");
        $i = 0;
        while ($row = mysql_fetch_array($query)) {
          $id = $row['id'];
          $dep = $row['dep'];
          $arr = $row['arr'];
          $value = "'$dep'," . "'$arr'," . "$id";
          $i++;
          echo "<tr><td>" .
            $id .
            "</td><td>" .
            $dep .
            "</td><td>" .
            $arr .
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
    <form id="modify_form" action="../Php/modify_ligne_script.php" method="post">
      <h2>Modification</h2>
      <input id="id_value" name="id" type="text" value="" hidden>
      <label for="dep">Gare de départ :</label>
      <input id="dep" name="dep" value="test" type="text" placeholder="Gare de départ" required pattern="[A-Za-z][A-Za-z]+"> <br>
      <label for="arr">Gare de destination :</label>
      <input id="arr" name="arr" value="" type="text" placeholder="Gare de destination" required pattern="[A-Za-z][A-Za-z]+">
      <button class="button_style" type="submit">Valider</button>
    </form>

  </div>

  <script>
    // Display and hide second form
    x = document.getElementById("modify_form");
    x.style.display = "none"

    function show(dep, arr, id) {
      if (x.style.display == "none") {
        x.style.display = 'flex';
      } else {
        x.style.display = 'none';
      }
      document.getElementById("arr").value = arr;
      document.getElementById("dep").value = dep;
      document.getElementById("id_value").value = id;
    }
  </script>
</body>

</html>