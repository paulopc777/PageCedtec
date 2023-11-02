<?php
require_once "./Modules/comands.php";
session_start();

if (!empty($_SESSION['id'])) {

    if (!empty($curse)) {
        $send = new Send();
        $veryfi = $send->charCurso($_SESSION['id']);

        // Inicialize um contador para armazenar o número de arrays encontrados
        $arrayCount = 0;
        // Itere pelos elementos da variável $var
        foreach ($veryfi as $element) {
            // Verifique se o elemento é um array
            if (is_array($element)) {
                $arrayCount++;
            }
        }
        $novoArray = [];
        for ($i = 0; $i < $arrayCount; $i++) {
            $novoArray[] = $veryfi[$i][3];
        }

        if (in_array($curse, $novoArray)) {
            echo "Ja Inscrito no Curso";
        } else {
            $check = $send->InsertCruse($_SESSION['id'], $curse);
            header("Location: /Logado");
        }
    } else {
        echo 'empyte falhou';
    }
} else {
    header("Location: /Login");
}
