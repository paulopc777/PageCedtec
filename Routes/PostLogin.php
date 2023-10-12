<?php
$email = null;
$pass = null;

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


    if (isset($result)) {
        if ($result[1] === $email and $result[2] === $pass) {
            header("Location: http://localhost:3000/Logado");
        } else {
            header("Location: http://localhost:3000/view/Login.php?erro=Insira email e senha");
        }
    } else {
        header("Location: http://localhost:3000/view/Login.php?erro=Email e senha errados");
    }
}
