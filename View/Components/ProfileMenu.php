<?php
require_once('Modules/comands.php');

$sends = new Send();
$result = $sends->charImgUser($_SESSION['id']);
//var_dump($result[0][0]);
if (isset($result[0])) {
    $img =  $result[0][1];
} else {
    $img = "";
}
echo "
<div class='dropdown'>
<button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>
    Menu
</button>
<ul class='dropdown-menu dropdown-menu-dark'>
    <li><a class='dropdown-item' href='/Logado'>Profile</a></li>
    <li><a class='dropdown-item ' href='/Cursos'>Cursos</a></li>
    <li><a class='dropdown-item' href='#'>Conquistas</a></li>
    <li>
        <hr class='dropdown-divider'>
    </li>
    <li><a class='dropdown-item' href='/destroy'>Deslogar</a></li>
</ul>
<div class='img-profifle'>
<img src='/uploads/".$img."'  width='40px' height='40px'>
</div>
</div>
";
