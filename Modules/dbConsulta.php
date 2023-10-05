<?php
    include ("./dbConect.php");

    mysql_query(mysql_connect($config[0],$config[1],$config[2],$config[3]),"SELECT * FROM Usuarios");
?>