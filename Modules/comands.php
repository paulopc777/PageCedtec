<?php

require_once ("./Modules/db.php");

class Send
{


    public function veryLogin($email, $pass)
    {
        $sqlcomand = $sqlcomand = "
        SELECT idUsuario,nome,email,senha 
        FROM usuario 
        WHERE email = \"$email\" AND senha = \"$pass\"
        ";
        $check = new DB(
            $sqlcomand
        );
        return $check->resultArray;
    }
    public function charCurso($idUser)
    {
        $sqlcomand = $sqlcomand = "
        SELECT nome,Titulo,descricao,categoria FROM usuario 
        JOIN cusospalestradors ON cusospalestradors.idPorfessor = usuario.idUsuario 
        join curso on curso.id = idCuros 
        where idUsuario = \"$idUser\";
        ";
        $check = new DB(
            $sqlcomand
        );
        if(array_key_exists(0,$check->resultArray)){
            return $check->resultArray;
        }else{
            return "erro";
        }
    }

}
