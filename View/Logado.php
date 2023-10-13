<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    logado
    <?php
    session_start();
    if (empty($_SESSION['id'])) {
        header("Location: http://localhost:3000/Login");
    }


    echo "<br>";

    var_dump($_SESSION['id']);

    echo ($_SESSION['id']);
    ?>
    <div>
        <a href="http://localhost:3000/destroy">destroy</a>
    </div>
</body>

</html>