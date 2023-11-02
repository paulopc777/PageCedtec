<?php
    $CharProf = new Send();
    $ResultCharProf = $CharProf->FindProfCurso($result[0][0]);
    //var_dump($ResultCharProf);
?>
<div class="Professor">
    <p class="fotn1">Professores do Curos</p>
    <div class="box-profs">
        <?php
            require_once('./Controller/arrayloop.php');
            new Arrayloop(3,$ResultCharProf);
        ?>
    </div>
</div>