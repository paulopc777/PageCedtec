<?php
    require_once('./Modules/comands.php');
    $send = new Send();
    $result = $send -> ListCurse();
    require_once('./Controller/arrayloop.php');

    new Arrayloop(2,$result);
?>
