<?php

if(isset($_POST['submit']))

{
    //print_r('Nome: ' . $_POST['nome']);
    //print_r('<br>');
    //print_r('Email: ' . $_POST['email']);
    //print_r('<br>');
    //print_r('Senha: ' . $_POST['senha']);
    //print_r('<br>');
    //print_r('CPF: ' . $_POST['cpf']);
   // print_r('<br>');
   // print_r('Data de nascimento: ' . $_POST['data_nasc']);
    //print_r('<br>');
    //print_r('Professor: ' . $_POST['professor']);
    
    include_once('configuracao.php');

    $nome = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];

    $result = mysqli_query($conexao, "INSERT INTO usuario_cadastro(email_usuario,senha_usuario,cpf_usuario) 
    VALUES ('$nome','$senha','$cpf')");

}

?>  

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

<a href="home.php">Voltar</a>

    <main>

        <div class="img-content">
            <img src="" alt="">
    </div>

    <div class=" form-content">

            <form action="Cadastro.php" method="POST">

                <div class="input-content">

                    <div class="input_email">

                        <label for="email" id="email" name="email"></label><br>

                        <input type="text" id="email" name="email" placeholder="Email"><br><br>

                    </div>

                    <div class="input_senha">

                        <label for="senha" id="senha" name="senha"></label><br>

                        <input type="password" id="senha" name="senha" placeholder="Senha"><br><br>

                    </div>

                    <div class="input_cpf">

                        <label for="cpf" id="cpf" name="cpf"></label><br>

                        <input type="text" id="cpf" name="cpf" placeholder="CPF"><br><br>

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
