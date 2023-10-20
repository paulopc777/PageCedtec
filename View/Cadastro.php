<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro alunos</title>
    <link rel="stylesheet" href="../Public/css/Cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    <?php

    session_start();

    if (!empty($_SESSION['id'])) {
        header("Location: http://localhost:3000/Logado");
    }

    if (!empty($err)) {
        $err  = $erro;
        require_once("Components/boxErro.php");
    }

    ?>

    <main>

        <div class="img-content">
            <img src="../Public/img/Megumin.webp" alt="">
        </div>

        <div class=" form-content">

            <form action="/Cadastro" method="POST">

                <div class="input-content">

                    <div class="input_email">

                        <input type="email" id="email" name="email" placeholder="Email" required><br><br>

                    </div>

                    <div class="input_senha">

                        <input type="password" id="senha" name="senha" placeholder="Senha" required><br><br>

                    </div>

                    <div class="input_cpf">

                        <input type="text" id="name" name="name" placeholder="name" required><br><br>

                    </div>

                    <div class="btn-cadastro">

                        <button type="submit" name="submit" id="submit">Cadastro</button>

                    </div>

                </div>

            </form>

        </div>

    </main>

</body>

</html>