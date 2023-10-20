<?php
include_once('../PageCedtec/Modules/comands.php');


if (!empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['name'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $name = $_POST['name'];

    echo "\"$email\",\"$senha\",\"$name\"";

    $db = new Send();

    $db  = $db->InsertUser($name, $email, $senha);
    
    header("Location: http://localhost:3000/view/Login.php?erro=Insira email e senha");
} else {
    echo "erro";
}
