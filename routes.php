<?php

use \Pecee\SimpleRouter\SimpleRouter as Route;

//Home
Route::get('/', function () {
    require_once('./View/Home.php');
});

// Home do site
Route::get('/home', function () {
    require_once('./View/Home.php');
});

//Login
Route::get('/Login', function () {
    require_once('./View/Login.php');
});

Route::get('/Login/{err}', function ($err) {
    $erro = $err;
    require_once('./View/Login.php');
});

Route::post('/Login', function () {
    require_once('./Controller/PostControll/Postlogin.php');
});

//Cadastro
Route::get('/Cadastro', function () {
    require_once('./View/Cadastro.php');
});

Route::get('/Cadastro/{err}', function ($erro) {
    $err = $erro;
    require_once('./View/Cadastro.php');
});

Route::post('/Cadastro', function () {
    require_once("./Controller/PostControll/PostCadastro.php");
});

//Pagina de Logado
Route::get('/Logado', function () {
    if ($_SESSION['id']) {
        header("Location: http://localhost:3000/Logado/" . session_id());
    } else {
        header("Location: http://localhost:3000/Login");
    }
});

Route::get('/Logado/{id}', function ($id) {
    session_start();
    if ($_SESSION['id'] and $id === session_id()) {
        require_once('./View/Private/Logado.php');
    } else {
        header("Location: http://localhost:3000/Login");
    }
});

Route::post('/Logado', function (){
    require_once('Controller/PostControll/PostLogado.php');
});


// Finalização de sessao 
Route::get('/destroy', function () {
    session_start();

    if (!empty($_SESSION['id'])) {
        unset($_SESSION['id']);
        $_SESSION = array();
    } else {
    }
    Route::response()->redirect('http://localhost:3000/Login');
});

Route::get('/teste', function () {
    require_once('./View/session.php');
});


Route::get('/Deshboard' , function (){
    require_once('./View/Private/dashboard.php');
});