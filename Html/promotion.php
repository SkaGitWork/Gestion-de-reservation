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

  <h2>Une seule promotion peut être appliquée à la fois</h2>

  <!-- Add form -->
  <form id="add_form" action="../Php/add_promo_script.php" method="post">
    <label for="">Libéllé :</label>
    <input name="libelle" value="" type="text" placeholder="Libéllé" required pattern="[A-Z][A-Za-z]+">
    <label for="">Montant :</label>
    <input name="montant" value="" type="number" placeholder="Montant" required step="0.1" max="1" min="0.1">
    <button class='button_style' type="submit">Enregistrer</button>
  </form>

  <div id="forms">
    <!--Display table Database-->
    <form action="../Php/delete_train_script.php?table=promotion" method="post">
      <table id="table">
        <tr>
          <th>Id</th>
          <th>Libéllé</th>
          <th>Montant</th>
          <th>Supprimer</th>
          <th>Modifier</th>
          <th>Activer</th>
        </tr>
        <?php
        include '../Php/config.php';
        $query = mysql_query("select * from promotion");
        $i = 0;
        while ($row = mysql_fetch_array($query)) {
          $id = $row['id'];
          $libelle = $row['libelle'];
          $montant = $row['montant'];
          $actif = $row['actif'];
          $value = "'$libelle'," . "'$montant'," . "$id";
          $i++;
          echo "<tr><td>" .
            $id .
            "</td><td>" .
            $libelle .
            "</td><td>" .
            $montant .
            "</td><td>" .
            "<input type='checkbox' value='$id' name='check$i'>
          </td><td>" .
            "<a href='#' onclick=show($value) value='$id'>Modifier</a></td><td>";

          if ($actif == 0) {
            echo "<a href='../Php/activer.php?id=$id'>Activer</a>";
          } else {
            echo "<span style='color:red'>Déjà activer</span>";
          }
          echo "</td></tr>";
        }
        ?>
      </table>

      <button class="button_style" type="submit">Supprimer</button>
    </form>

    <!--Hidden form for modify-->
    <form id="modify_form" action="../Php/modify_promotion_script.php" method="post">
      <h2>Modification</h2>
      <input id="id_value" name="id" type="text" value="" hidden>
      <label for="dep">Libéllé :</label></label>
      <input id="dep" name="libelle" value="test" type="text" placeholder="Libéllé" required pattern="[A-Za-z][A-Za-z]+"> <br>
      <label for="arr">Montant :</label>
      <input id="arr" name="montant" value="" type="number" placeholder="Montant" required step="0.1" max="1" min="0.1">
      <button type="submit">Valider</button>
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