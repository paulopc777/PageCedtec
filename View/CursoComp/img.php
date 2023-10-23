<?php
require_once('Modules/comands.php');

if (!empty($curse)) {
    //var_dump($curse);
    $Curso =  str_replace("_", " ", $curse);
    //var_dump($Curso);
    $send = new Send();
    $result = $send->findCurso($Curso);
    //var_dump($result);
} else {
}

?>

<div class="img">
    <img src="/public/img/img-curos-full/<?php echo $result[0][2] ?>.png" alt="">
</div>