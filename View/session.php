<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('../PageCedtec/Controller/Session.php');
        require_once('../PageCedtec/Modules/comands.php');
        require_once('../PageCedtec/Controller/arrayloop.php');

        $sesi = new Sension('1');
        echo $sesi -> Verify();

        $db = new Send();
        $db = $db-> charCurso($_SESSION['id']);
        
        var_dump($db[0][1]);


        $array = new Arrayloop($db);

        ?>
</body>
</html>