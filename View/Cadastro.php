<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro alunos</title>
    <style>
        * {

            margin: 0;
            padding: 0;

        }

        .input-content {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;

        }
    </style>
</head>

<body>

    <div class="form-content">

        <form action="#">

            <div class="input-content">

                <div class="input_email">

                    <label for="email" id="email" name="email">Email</label><br>

                    <input type="text" id="email" name="email"><br><br>

                </div>

                <div class="input_senha">

                    <label for="senha" id="senha" name="senha">Senha</label><br>

                    <input type="password" id="senha" name="senha"><br><br>

                </div>

                <div class="input_cpf">

                    <label for="cpf" id="cpf" name="cpf">Cpf</label><br>

                    <input type="text" id="cpf" name="cpf"><br><br>

                </div>

                <div class="input_botao">

                    <input type="submit">

                </div>

            </div>

        </form>

    </div>

</body>

</html>
