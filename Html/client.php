<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require "../Php/client_functions.php";
require "../Php/config.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../Css/client_style.css">
  <title>SNCFT</title>
</head>

<body>
  <div id="page">
    <header>
      <div id="my_header">
        <div id="content">
          <div><img src="../Image/logo0.svg" alt="Logo" id="logo"><span id='title'>Société nationale des chemins de fer tunisien</span></div>
          <a href="admin_connection.php" class="button-style">Gérer</a>
        </div>
      </div>
    </header>

    <div id="main">

      <!-- Slideshow container -->
      <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->

        <div class="mySlides fade">
          <img src="../Image/train-gare-jodhpur.jpg" style="width:100%">
          <div class="text">Un voyage inoubliable</div>
        </div>

        <div class="mySlides fade">
          <img src="../Image/train_banner.jpg" style="width:100%">
          <div class="text">Decouvrez un nouveau monde avec nous</div>
        </div>

        <div class="mySlides fade">
          <img src="../Image/aerial-view-transport-concept-with-railroad.jpg" style="width:100%">
          <div class="text">Voyager en sureté avec nous</div>
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- The dots/circles -->
        <div id="dots_position">

          <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div>
        </div>
      </div>


      <div id="command-panel">
        <!-- Button icons -->
        <div id="command-buttons">
          <ul>
            <li><a id="button-1" href="#" onmousedown="control('button-1')" onmouseover="highlight(this)" onmouseout="fade(this)"><img src="../Image/Icon iténéraire.png" alt=""><span class="icon-text">Itinéraire</span></a></li>

            <li><a id="button-2" href="#" onmousedown="control('button-2')" onmouseover="highlight(this)" onmouseout="fade(this)">
                <img src="../Image/Icon réserver.png" alt=""><span class="icon-text">Suivre vos réservation</span></a></li>

            <li><a id="button-3" href="#" onmousedown="control('button-3')" onmouseover="highlight(this)" onmouseout="fade(this)">
                <img src="../Image/Heure Icon.png" alt=""><span class="icon-text">Horaire de gare</span></a></li>

            <li><a id="button-4" href="#" onmousedown="control('button-4')" onmouseover="highlight(this)" onmouseout="fade(this)">
                <img src="../Image/Train.png" alt=""><span class="icon-text">N° de train</span></li></a>
          </ul>
        </div>
        <hr>

        <div id="command-menu">
          <!-- First Tab -->
          <form action="iteneraire.php" method="post" id="command-menu-1">
            <p>Gare de départ:</p>
            <select name="list_dep" id="list-from" onchange="update()" required>
              <option value="" disabled selected>Choisissez une gare</option>

              <!-- Show departure stations -->
              <?php
              get_departure();
              ?>

            </select>
            <button class='button-style' type="submit">Valider</button>

            <p>Gare de destination:</p>
            <select name="list" id="list-from-destination" required></select>
            <input type="date" name="date">
          </form>

          <!-- Second Tab-->
          <div id="command-menu-2">
            <p>Connectez vous pour voir vos réservations</p>
            <a class='button-style' href="indexx.php?vers=display_reservation">Se connecter</a>
          </div>

          <!-- Third tab -->
          <form action="horaire_de_gare.php" method="post">
            <div id="command-menu-3">
              <p>Nom de la gare:</p>
              <!-- Show departure stations -->
              <select name="horaire_list" id="list-from" required>
                <option value="" disabled selected>Choisissez une gare</option>

                <?php
                get_departure();
                ?>

              </select>
              <button class='button-style' type="submit" class='button_style'>Rechercher</button>
            </div>
          </form>

          <!-- Forth tab -->
          <form action="train_list.php" method="post">
            <div id="command-menu-4">
              <div>
                <label>Numéro de train</label>
                <select name="num_train" required>
                  <option value="" disabled selected>Choisissez un numéro</option>
                  <?php
                  get_train()
                  ?>
                </select>
              </div>
              <div>
                <label>Date de départ:</label>
                <input type="date" name="date" id="">
              </div>
              <button class='button-style' type="submit" class='button_style'>Rechercher</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Useless footer -->
    <footer>
      <table>
        <tr>
          <td><a href="#">Qui somme-nous ?</a></td>
          <td><a href="#">Journalistes</a></td>
          <td><a href="#">Zoom sur la multimodalité</a></td>
          <td rowspan="2"><a href="#"><strong>Label AccessiWeb 2019</strong><br>Niveau Argent.<br>
              Preuve de notre engagement dans <br> l’inclusion numérique.</a>
          </td>
        </tr>
        <tr>
          <td><a href="#">Gouvernance</a></td>
          <td><a href="#">Investiseur</a></td>
          <td><a href="#">Les navettes autonomes</a></td>
        </tr>
        <tr>
          <td><a href="#">Marque & Design</a></td>
          <td><a href="#">Fournisseurs</a></td>
          <td><a href="#">Des camions sur des trains</a></td>
        </tr>
        <tr>
          <td><a href="#">Magasin Grand Train</a></td>
          <td><a href="#">Emploi</a></td>
          <td><a href="#">La location de voitures entre <br> particuliers</a></td>
        </tr>
      </table>
    </footer>
  </div>
</body>
<!-- Display tabs corresponding to the pressed button and highlight icons...-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="../Js/client_app.js"></script>

</html>