<?php


if (empty($_POST['email'])) {

    header("Location: http://localhost:3000/view/Login.php?erro=Insira email");
} else if (empty($_POST['pass'])) {

    header("Location: http://localhost:3000/view/Login.php?erro=Insira senha");
} else {
    if ($_POST['email'] and $_POST['pass']) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    } else {
        header("Location: http://localhost:3000/view/Login.php?erro=Insira email e senha");
    }


    require('./Modules/comands.php');
    $check = new Send();
    $result = $check->veryLogin($email, $pass);
    $result = $result[0];

    if (isset($result)) {

        if (strtolower($result[2])  == strtolower($email) and strtolower($result[3]) === strtolower($pass)) {
            session_start();
            $_SESSION['id'] = $result[0] ;
            header("Location: http://localhost:3000/Logado/".session_id()." ");
        } else {
            header("Location: http://localhost:3000/view/Login.php?erro=Email e senha errados");
        }
        
    } else {
        header("Location: http://localhost:3000/view/Cadastro.php?erro=Email não cadastrado");
    }
}
