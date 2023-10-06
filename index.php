<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require("Modules/db.php");
    $find = new Find();
    $find->sendComand("select *  from usuario where idUsuario = 1");
    while ($user = mysqli_fetch_row($find->result)) {
        for($i = 0;$i <= count($user);$i++ ){
            echo "<p>".$user[$i]."</p>";
        }
    }
    ?>
    
</body>
</html>