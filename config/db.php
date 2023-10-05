<?php
    //arquivo de comfiguraçoes
    //guardando dados do banco 
    $config = [

        "host" => "localhost",
        "port" => "3306",
        "database" => "db1",
        "user" => "root",
        "pass" => "",
        "opitions" => [
            PDO::ATTR_TIMEOUT => 5,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SER NAMES utf8"
        ]
    ]
?>