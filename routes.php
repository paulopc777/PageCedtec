<?php

use \Pecee\SimpleRouter\SimpleRouter as Route;

//Home
Route::get('/', function () {
    require_once('./View/Home.php');
});

//Login
Route::get('/Login', function () {
    require_once('./View/Login.php');
});
Route::post('/Login', function () {
    require_once('./Controller/Postlogin.php');
});

//Cadastro
Route::get('/Cadastro', function () {
    require_once('./View/Cadastro.php');
});
Route::post('/Cadastro', function ( ) {
    require_once("./Controller/PostCadastro.php");
});

//Pagina de Logado
Route::get('/Logado/{id}', function ($id) {
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
        $_SESSION = array();
    } else {
        
    }
    Route::response() -> redirect('http://localhost:3000/Login');
});
