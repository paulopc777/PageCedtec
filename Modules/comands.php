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
        SELECT imgs.nameImg ,nomeCurso,group_concat(modulos.nomeModulo)'nomeModulo' FROM usuarios 
        join matricula on matricula.Usuarios_idUsuarios = idUsuarios 
        join cursos on matricula.Cursos_idCursos =idCursos
        join modulos on modulos.Cursos_idCursos = idCursos
        join img_de on img_de.Cursos_idCursos = idCursos
        join imgs on imgs.idImgs = img_de.Imgs_idImgs
        where idUsuarios = \" $idUser \"
        GROUP BY nameImg
        ORDER BY idModulos  
    ;";
        $db = new DB(
            $sqlcomand
        ) or die('err charCurso');

        if (array_key_exists(0, $db->resultArray)) {
            //$seult = $db -> resultArray;
           // $this -> result = $seult;
            return $db->resultArray;
        } else {
            return 'erro';
        }
    }

    public function veryfiCurse($idUser){
        $sqlcomand = "
        SELECT * FROM db3.matricula 
        join usuarios on matricula.Usuarios_idUsuarios = idUsuarios 
        where idUsuarios = \"$idUser\";";
        $db = new DB($sqlcomand) or die('err');

        if (array_key_exists(0, $db->resultArray)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Inseri dados no banco
     */
    public  function InsertUser($name, $email, $pass)
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

    public function UpdateName($UserId,$NewName){

        $sqlcomand = "
        UPDATE usuarios SET nomeUsuario = \"$NewName\"
        WHERE usuarios.idUsuarios =".$UserId."
        ;";
        var_dump($sqlcomand);
        $db = new DB($sqlcomand) or die ('erro');

        return $db->result;
    }   
}
