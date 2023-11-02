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
    require_once('./Controller/PostControll/PostLogin.php');
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
        header("Location:/Logado/" . session_id());
    } else {
        header("Location: /Login");
    }
});

Route::get('/Logado/{id}', function ($id) {
    session_start();
    if ($_SESSION['id'] and $id === session_id()) {
        require_once('./View/Private/Logado.php');
    } else {
        header("Location: /Login");
    }
});

Route::post('/Logado', function (){
    require_once('Controller/PostControll/PostLogado.php');
});


//Curso

Route::get('/Curso', function () {
    require_once('View/CursoList.php');
});
Route::get('/Cursos', function () {
    require_once('View/CursoList.php');
});

Route::get('/Curso/{Curse}', function ($curse) {
    require_once('View/Curso.php');
});

Route::get('/Inscricao/{Curse}', function ($curse) {
    require_once('./Controller/PostControll/PostCurso.php');
});

Route::get('/admin', function(){
    require_once('./View/Private/admin.php');
});


// Finalização de sessao 
Route::get('/destroy', function () {
    session_start();

    if (!empty($_SESSION['id'])) {
        unset($_SESSION['id']);
        $_SESSION = array();
    } else {
    }
    Route::response()->redirect('/home');
});
