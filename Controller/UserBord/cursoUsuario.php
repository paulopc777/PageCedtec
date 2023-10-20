<?php


require_once('Controller/arrayloop.php') ;

$send = new Send();
$result = $send->charCurso(1);
$ex = $send -> result;

for ($i=0; $i < $ex ; $i++) { 
    $ress = $ex[$i];
    echo"
    <div class='curso-1' style='background: #11162F;'>
                <div class='Curso-img'>
                    <a href=''>
                        <img src='/Public/img/img-curso-small/".$img."' alt='".$categoria."'>
                    </a>
                </div>
                <div class='Curso-text'>
                    <ul>
                        <li>".$Modulo."</li>
                        <li>".$Modulo."</li>
                        <li>".$Modulo."</li>
                    </ul>
                </div>
            </div>
        ";
}