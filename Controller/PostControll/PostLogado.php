<?php

use \Pecee\SimpleRouter\SimpleRouter as Route;

require_once('Modules/comands.php');
session_start();

var_dump($_POST);
echo "<hr>";

if ($_SESSION['id']) {

    if (!empty($_POST['name'])) {
        require_once('Modules/comands.php');
        $new = new Send();
        $new->UpdateName($_SESSION['id'], $_POST['name']);
        $_SESSION['nome'] = $_POST['name'];
        header("Location: http://localhost:80/Logado");
    } else {
    }

    // Verifique se o arquivo foi enviado sem erros
    if (!empty($_FILES['imagem'])) {

        $nomeArquivo = $_FILES['imagem']['name'];
        $tipoArquivo = $_FILES['imagem']['type'];
        $tamanhoArquivo = $_FILES['imagem']['size'];
        $nomeTemporario = $_FILES['imagem']['tmp_name'];

        // Defina o diretório de destino onde a imagem será armazenada
        $diretorioDestino = 'uploads/';

        // Crie um nome único para o arquivo
        $nomeUnico = uniqid() . '_' . $nomeArquivo;

        // Verifique se o tipo de arquivo é uma imagem
        $tiposPermitidos = array('image/jpeg', 'image/png', 'image/gif');
        $sends = new Send();
        $result = $sends->charImgUser($_SESSION['id']);
        var_dump($result[0][1]);
        if (in_array($tipoArquivo, $tiposPermitidos)) {
            // Movimente o arquivo temporário para o diretório de destino com o nome único
            if (move_uploaded_file($nomeTemporario, $diretorioDestino . $nomeUnico)) {

                if (!empty($result[0][1])) {
                    $caminhoCompleto = $diretorioDestino . $result[0][1];
                    unlink($caminhoCompleto);

                    $send = new Send();
                    $send->updateImgUser($result[0][0], $nomeUnico);
                } else {
                    $send = new Send();
                    $send->addImg('user', $_SESSION['id'], $nomeUnico);
                }

                echo "A imagem foi enviada com sucesso!";
                header("Location: http://localhost:80/Logado");
            } else {
                echo "Erro ao mover o arquivo para o diretório de destino.";
            }
        } else {
            echo "Tipo de arquivo não suportado. Apenas imagens JPEG, PNG e GIF são permitidas.";
        }
    } else {
        echo "Erro no upload da imagem. Verifique se você escolheu um arquivo válido.";
    }

    
} else {
        Route::response()->redirect('http://localhost:80/Logado');
}
