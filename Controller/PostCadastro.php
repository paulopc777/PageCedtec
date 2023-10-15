<?php
include_once('../PageCedtec/Modules/comands.php');


if (!empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['cpf'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

        echo "\"$email\",\"$senha\",\"$cpf\"";

        $db = new Send();
        $db  = $db -> InsertUser($email,$senha,$cpf);

        header("Location: http://localhost:3000/view/Login.php?erro=Insira email e senha");
}else{
    echo "erro";
}
