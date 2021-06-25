
<?php
session_start();

$table =  $_GET["table"];
// Set clean name table to display
switch ($table) {
  case 'classe_de_transport':
    $_SESSION["clean_name"] =  'Classe de transport';
    break;
  case 'couchette':
    $_SESSION["clean_name"] =  'Couchette';
    break;
  case 'repas':
    $_SESSION["clean_name"] =  'Repas';
    break;
  case 'type_billet':
    $_SESSION["clean_name"] =  'Type de billet';
    break;
  case 'profil_passager':
    $_SESSION["clean_name"] =  'Profil de passager';
    break;
}

    $_SESSION["table"] = $table;
    header("Location: ../Html/tarif.php?");

?>
