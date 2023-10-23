<?php

//Verifica se a dados antes da query na db 
if (empty($_POST['email'])) {

    header("Location: http://localhost:80/Login/Email");
} else if (empty($_POST['pass'])) {

    header("Location: http://localhost:80/Login/Senha");
} else {
    if ($_POST['email'] and $_POST['pass']) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    } else {
        header("Location: http://localhost:80/view/Login.php?erro=Insira email e senha");
    }

    // chama o send para query 
    require('./Modules/comands.php');
    $check = new Send();
    $result = $check->veryLogin($email, $pass);
    $result = $result[0];

    //Checa o resultado 
    if (isset($result)) {
        
        if (strtolower($result[2])  == strtolower($email) && strtolower($result[3]) === strtolower($pass)) {
            session_start();
            $_SESSION['id'] = $result[0];
            $_SESSION['nome'] = $result[1];
            header("Location: http://localhost:80/Logado/" . session_id());
        } else {
            header("Location: http://localhost:80/Login/Email_senha_errados");
        }
    } else {
        header("Location: http://localhost:80/Cadastro/Email_não_cadastrado");
    }
}
