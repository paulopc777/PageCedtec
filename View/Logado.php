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
    echo "<hr>";
    var_dump($_SESSION);
    echo ($_SESSION['id']);

    ?>
    <div>
        <a href="http://localhost:3000/destroy">destroy</a>
    </div>
</body>

</html>