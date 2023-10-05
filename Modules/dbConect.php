<?php
//host-user-pass-typedb
$config = ["localhost", "root", "", "db1"];

try {
    $dbconect = new mysqli($config[0], $config[1], $config[2], $config[3]);
} catch (Exception $err) {
    echo "erro ao corregar db " . $err;
}




