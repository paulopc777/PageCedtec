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
    //
    // $send = new Send();
    // $result = $send->charCurso(1);
    //  $ex = $send->result;
    //var_dump($ex);


    $db = new DB("
  
    SELECT imgs.nameImg ,nomeCurso,group_concat(modulos.nomeModulo)'nomeModulo' FROM usuarios 
    join matricula on matricula.Usuarios_idUsuarios = idUsuarios 
    join cursos on matricula.Cursos_idCursos =idCursos
    join modulos on modulos.Cursos_idCursos = idCursos
    join img_de on img_de.Cursos_idCursos = idCursos
    join imgs on imgs.idImgs = img_de.Imgs_idImgs
    where idUsuarios = 1
    GROUP BY nameImg
    ORDER BY idModulos  
;
    ");

    //$data = mysqli_fetch_assoc($db-> result);
    //var_dump($data);
    echo '<br><hr>';
    var_dump($db->resultArray);

    $result = $db->resultArray;

    echo count($result);
    
    new Arrayloop(1, $result);

    ?>
</body>

</html>