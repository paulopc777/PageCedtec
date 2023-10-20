<?php

if (!empty($_SESSION['id'])) {
    header("Location: http://localhost:3000/Login");
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

    $send = new Send();
    $result = $send->charCurso(1);
    $ex = $send->result;
    var_dump($ex);

    for ($i = 0; $i < $ex; $i++) {
        $ress = $ex[$i];
        echo "
        <div class='curso-1' style='background: #11162F;'>
                    <div class='Curso-img'>
                        <a href=''>
                            <img src='/Public/img/img-curso-small/" . $img . "' alt='" . $categoria . "'>
                        </a>
                    </div>
                    <div class='Curso-text'>
                        <ul>
                            <li>" . $Modulo . "</li>
                            <li>" . $Modulo . "</li>
                            <li>" . $Modulo . "</li>
                        </ul>
                    </div>
                </div>
            ";
    }
    ?>
</body>

</html>