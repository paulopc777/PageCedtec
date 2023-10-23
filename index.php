<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
</head>

<body>
    <?php  
    
    require __DIR__."/vendor/autoload.php";  
    use \pecee\SimpleRouter\SimpleRouter;

    require_once __DIR__.'/routes.php';

    SimpleRouter::setDefaultNamespace('\Demo\Controllers');
    SimpleRouter::start();

    ?>
</body>
</html>