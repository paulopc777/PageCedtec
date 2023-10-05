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
        echo "<p>" . $user[0] . "</p>";
        echo "<p>" . $user[1] . "</p>";
        echo "<p>" . $user[2] . "</p>";
    }
    ?>
</body>

</html>