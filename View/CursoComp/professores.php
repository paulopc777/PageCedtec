<<<<<<< HEAD
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
=======
<div class="Professor">
    <p class="fotn1">Professores do Curos</p>
    <div class="box-profs">
        <div class="box-Professor">
            <div class="img-prof">
            </div>
            <p>Name</p>
        </div>
        <div class="box-Professor">
            <div class="img-prof">
            </div>
            <p>Name</p>
        </div>
>>>>>>> 9869024a38f6ce40e44facf98fdda36072e499f3
    </div>
</div>