<?php

include '../Php/config.php';

foreach ($_POST as $value) {
    mysql_query("delete from ligne where id = $value");
}
mysql_close();
// header("Location: ../Html/ligne.php");
