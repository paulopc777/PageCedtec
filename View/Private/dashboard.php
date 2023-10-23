<?php

if (!empty($_SESSION['id'])) {
    header("Location: http://localhost:80/Login");
} else {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>ola</p>
    <?php
    require_once('Modules/comands.php');
    require_once('Controller/arrayloop.php');
    require_once('Modules/db.php');
    session_start();
    require_once('View/Components/renderimg.php');


    ?>
</body>

</html>