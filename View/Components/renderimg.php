<?php
    //session_start();
    require_once('Modules/comands.php');

    $sends = new Send();
    $result = $sends -> charImgUser($_SESSION['id']);
    //var_dump($result[0][0]);
    if(isset($result[0])){
        echo "<img id='img-c' src='/uploads/".$result[0][1]."' alt='Foto Perfil' width='130px' height='130px'>";
    }else{
        
    }