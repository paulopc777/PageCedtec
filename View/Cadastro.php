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
    <main>

        <div class="img-content">
            <img src="../Public/img/Megumin.webp" alt="Megumin">
        </div>

        <div class=" form-content">

            <form action="#">

                <div class="input-content">

                    <div class="input_email">

                        <input type="text" id="email" name="email" placeholder="Email">

                    </div>

                    <div class="input_senha">


                        <input type="password" id="senha" name="senha" placeholder="senha">

                    </div>

                    <div class="input_cpf">

                        <input type="text" id="cpf" name="cpf" placeholder="Cpf">

                    </div>

                    <div class="btn-cadastro">

                        <button>Cadastro</button>

                    </div>

                </div>

            </form>

        </div>

    </main>

</body>

</html>
