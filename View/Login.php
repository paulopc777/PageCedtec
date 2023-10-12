<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Public/css/Login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

      <a href="home.php">Voltar</a>
    
    <main>
        
        <?php
        $erroMessage = null;
    
        if (isset($_GET['erro'])) {
            $erroMessage = $_GET['erro'];
        } else {

        }
        
        if($erroMessage){
            $erro  = $erroMessage;
            require("./Components/boxErro.php");
        }
        ?>

        <div class="img-content">
            <img src="../Public/img/eva01.webp" alt="eva01">
        </div>
        <div class="form-content">
            <form method="post" action="/Login">
                <div class="input-content">
                    <input type="text" name="email">
                    <input type="text" name="pass">
                </div>
                <div class="btn-login">
                    <button type="submit" name="submit" id="submit">Login</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>