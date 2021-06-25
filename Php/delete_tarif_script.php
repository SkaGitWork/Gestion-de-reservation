
<?php

include '../Php/config.php';

$table = $_GET["table"];

foreach ($_POST as $value) {
    mysql_query("delete from $table where id = $value");
}
mysql_close();
header("Location: ../Html/tarif.php");
?>