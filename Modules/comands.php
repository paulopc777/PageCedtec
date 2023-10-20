<?php

require_once("./Modules/db.php");

class Send
{
    /**
     * Quarda o resultado dos Comando para ser acessado posterior mente.
     */
    public $result  = null;

    /**
     * Verifica se o login existe
     * @email String
     * @senha or pass String
     * @return array  em Send -> $result 
     */
    public function veryLogin($email, $pass)
    {
        $sqlcomand = "SELECT 
        idUsuarios,nomeUsuario,emailUsuario,senhaUsuario
        FROM usuarios
        where  emailUsuario =  \"$email\" AND SenhaUsuario = \"$pass\"
        ";

        $db = new DB($sqlcomand);

        return $db->resultArray;
    }

    /**
     * Acha todos so cursos do usuario
     * @param int  id do Usuario 
     * @return array  em Send -> $result 
     * @return string casso erro 
     */
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
        ) or die('err charCurso');

        if (array_key_exists(0, $db->resultArray)) {
            return $db->resultArray;
        } else {
            return 'erro';
        }
    }

    /**
     * Inseri dados no banco
     */
    public  function InsertUser( $name , $email, $pass)
    {
        $sqlcomand = "
        INSERT  INTO  usuarios (nomeUsuario,emailUsuario,senhaUsuario)
        Value(
            \"$name\",
            \"$email\",
            \"$pass\"
        );
        ";
        $db = new DB($sqlcomand) or die('erro send db Inset');

        return  $db->resultArray;
    }
}
