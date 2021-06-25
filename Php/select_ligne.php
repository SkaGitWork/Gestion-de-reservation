<?php

include '../Php/config.php';
// error_reporting(0);

$query = mysql_query("select * from ligne");

    while ($row = mysql_fetch_array($query)) {
        echo "<tr><td>" . 
        $row['id'] .
        "</td><td>" .
        $row['dep'] .
        "</td><td>" .
        $row['arr'] . 
        "</td><td>" ;
    }

mysql_close();
