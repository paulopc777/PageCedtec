<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<<<<<<< HEAD


    <?php

    require __DIR__ . "/vendor/autoload.php";

    use \pecee\SimpleRouter\SimpleRouter;

    require_once __DIR__ . '/routes.php';
=======
<body>
    <?php  
    
    require __DIR__."/vendor/autoload.php";  
    use \pecee\SimpleRouter\SimpleRouter;

    require_once __DIR__.'/routes.php';
>>>>>>> 9869024a38f6ce40e44facf98fdda36072e499f3

    SimpleRouter::setDefaultNamespace('\Demo\Controllers');
    SimpleRouter::start();

    ?>
</html>