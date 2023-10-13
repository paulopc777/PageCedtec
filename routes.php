<?php

use \Pecee\SimpleRouter\SimpleRouter as Route;

Route::get('/', function () {
    require_once('./View/Home.php');
});

Route::get('/Login', function () {
    require_once('./View/Login.php');
});

Route::post('/Login', function () {
    require_once('./Routes/Postlogin.php');
});

Route::get('/Cadastro', function () {
    require_once('./View/Cadastro.php');
});

Route::get('/Logado', function () {
    require_once('./View/Logado.php');
});

Route::get('/home', function () {
    require_once('./View/Home.php');
});

Route::get('/teste', function () {
    require_once('./View/session.php');
});

Route::get('/destroy', function () {
    session_start();

    if (!empty($_SESSION['id'])) {
        unset($_SESSION['id']);
    } else {
        
    }
    Route::response() -> redirect('http://localhost:3000/Login');
});
