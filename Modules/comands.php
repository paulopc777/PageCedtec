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
        SELECT imgs.nameImg ,nomeCurso,group_concat(modulos.nomeModulo)'nomeModulo',idCursos FROM usuarios 
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

    /**
     * Verifica se o usuario tem matriculas abertas 
     * @param int $idUser Id do usuario a ser consultado
     * @return bool so retorna true e false
     */
    public function veryfiCurse($idUser)
    {
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

    /**
     * Faz o Update somente do nome de Usuario
     * @param int $UserId Id de Usuario que sera modificado
     * @param string $NewName Novo nome de Usuario
     */
    public function UpdateName($UserId, $NewName)
    {

        $sqlcomand = "
        UPDATE usuarios SET nomeUsuario = \"$NewName\"
        WHERE usuarios.idUsuarios =" . $UserId . "
        ;";
        var_dump($sqlcomand);
        $db = new DB($sqlcomand) or die('erro');

        return $db->result;
    }
    /**
     * Ache o Curo pelo nome do mesmo 
     * @param string $nomeCurso Nome do Curso a pesquisar
     * @return array array de dados do curso
     */
    public function findCurso($nomeCurso)
    {
        $sqlcomand = "
        SELECT nomeCurso,descricaoCurso,Name,group_concat(nomeModulo),group_concat(descricaoModulo),
        idCursos
        FROM cursos 
        join cutegorias on cursos.Cutegorias_idCutegorias = cutegorias.idCutegorias 
        join modulos on modulos.Cursos_idCursos = cursos.idCursos where nomeCurso = \"$nomeCurso\";
        ";
        $db = new DB($sqlcomand) or die("Erro send findCurso");
        return $db->resultArray;
    }
    /**
     * Lista 4 cursos no banco de dados
     * 
     */
    public function ListCurse()
    {
        $sqlcomand = "
        SELECT nomeCurso,descricaoCurso,imgs.nameImg  FROM cursos 
        join cutegorias on cursos.Cutegorias_idCutegorias = cutegorias.idCutegorias 
        join img_de on img_de.Cursos_idCursos = idCursos
        join imgs on imgs.idImgs = img_de.Imgs_idImgs
        ORDER BY RAND()
        LIMIT 4 
        ;
        ";
        $db = new DB($sqlcomand) or die("erro char Cruso");
        return $db->resultArray;
    }

    public function FindProfCurso($nomeCurso)
    {
        $sqlcomand = "
        select idProfessor,nomeProfessor from professordocurso 
        join professores on professordocurso.Professores_idProfessor = idProfessor
        join cursos on idCursos = professordocurso.Cursos_idCursos
        where cursos.nomeCurso = '" . $nomeCurso . "';
        ";
        $db = new DB($sqlcomand) or die("Erro char Professor de Curos");
        return $db->resultArray;
    }

    public function charAllCruse()
    {
        $sqlcomand = "
        select nomeCurso,descricaoCurso,group_concat(modulos.descricaoModulo ),imgs.nameImg from cursos 
        join modulos on modulos.Cursos_idCursos = idCursos
        join img_de on img_de.Cursos_idCursos = idCursos
        join imgs on imgs.idImgs = img_de.Imgs_idImgs
        group by nomeCurso        
        ;
        ";
        $db = new DB($sqlcomand) or die("Erro char all curses");
        return $db->resultArray;
    }

    public function addImg($chose, $IdUser, $nameImg)
    {
        $sqlcomand = "
        insert into imgs(nameImg)
        value(\"$nameImg\");";

        $db = new DB($sqlcomand) or die("Erro send Img");

        $idImg = $this->charImg($nameImg);
        $this->ralationImg($chose, $IdUser, $idImg);
        return 'ok img';
    }


    public function InsertCruse($idUser,$idCurse){

        $sqlcomand = "
        INSERT INTO matricula (matricula.Usuarios_idUsuarios,matricula.Cursos_idCursos)
        value(
            ".$idUser." ,
            ".$idCurse."
        );
        
        ";
        $db = new DB($sqlcomand) or die("Erro send Matricula");
        return $db->resultArray;
    }

    public function charImg($nameImg)
    {
        $sqlcomand = "
        SELECT idImgs FROM db3.imgs  where nameImg = \"$nameImg\";";
        $db = new DB($sqlcomand) or die("Erro find img");
        return $db->resultArray[0][0];
    }

    public function ralationImg($chose, $IdUser, $IdImg)
    {
        switch ($chose) {
            case "user":
                $sqlcomand = "
            insert into img_de(Usuarios_idUsuarios,Imgs_idImgs)
            value(" . $IdUser . "," . $IdImg . ");";
                $db = new DB($sqlcomand) or die("Erro to send Relation img");
                break;
        }
    }

    public function charImgUser($idUser)
    {
        $sqlcomand = "  
        SELECT imgs.idImgs,nameImg FROM img_de 
        join imgs on imgs.idImgs = img_de.Imgs_idImgs 
        join usuarios on usuarios.idUsuarios = img_de.Usuarios_idUsuarios 
        where idUsuarios = " . $idUser . ";
        ";
        $db = new DB($sqlcomand) or die("Erro renderizar img");
        return $db->resultArray;
    }

    public function updateImgUser($idImg, $nameImg)
    {
        $sqlcomand = "UPDATE imgs 
        SET nameImg = \"$nameImg\"
        WHERE imgs.idImgs =" . $idImg . " ; ";

        $db = new DB($sqlcomand) or die("Erro Update Img");
    }

    public function CharallUser()
    {
        $sqlcomand = "Select * from usuarios";

        $db = new DB($sqlcomand) or die("Erro Update Img");

        return $db->resultArray;
    }

    public function SairCurso($idCurse,$idUser){
        $sqlcomand = "
        delete from  matricula where Usuarios_idUsuarios = ".$idUser." and Cursos_idCursos =".$idCurse.";
        ";
        $db = new DB($sqlcomand) or die("Erro send Sair de Curso");
        return $db->resultArray;
    }
}