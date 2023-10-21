<?php


require_once('Controller/arrayloop.php') ;
require_once('Modules/comands.php') ;

$send = new Send();
$result = $send->charCurso($_SESSION['id']) ;



new Arrayloop(1,$result) ;

