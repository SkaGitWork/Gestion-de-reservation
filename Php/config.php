<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$c = mysql_connect("localhost","root","") or die ("La connexion a échoué");
$s = mysql_select_db ("reservation") or die ("La connexion ne marche pas");  

?>