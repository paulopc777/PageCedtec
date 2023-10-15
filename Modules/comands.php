<?php

require_once ("./Modules/db.php");

class Send
{
    public $result  = null;

    public function veryLogin($email, $pass)
    {
        $sqlcomand = "
        SELECT idUsuario,NomeUsuario,EmailUsuario,SenhaUsuario
        FROM usuarios 
        WHERE EmailUsuario = \"$email\" AND SenhaUsuario = \"$pass\"";

        $db = new DB(
            $sqlcomand
        ) or die ('erro');
        
        return $db->resultArray;
    }
    public function charCurso($idUser)
    {
        $sqlcomand = "
        SELECT nomeCurso,TituloCurso,descricaoCurso,categoriaCurso FROM usuario 
        JOIN cusospalestradors ON cusospalestradors.idPorfessor = usuario.idUsuario 
        join curso on curso.id = idCuros 
        where idUsuario = \"$idUser\";
        ";
        $db = new DB(
            $sqlcomand
        ) or die ('err charCurso');

        if(array_key_exists(0,$db->resultArray)){
            return $db->resultArray;
        }else{
            return "erro";
        }
    }
    public  function InsertUser($email,$pass,$cpf){
        $sqlcomand = "
        INSERT  INTO  usuarios (EmailUsuario,SenhaUsuario,CpfUsuario)
        Value(
            \"$email\",
            \"$pass\",
            \"$cpf\"
        );
        ";
        $db = new DB($sqlcomand) or die ('erro send db Inset');

        return  $db -> resultArray;
    }

}
