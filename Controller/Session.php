<?php

class Sension{
    

    function __construct($id){
        $this -> Start($id);
        $this -> Verify();
    }
    function Start($idUser){
        session_start();
        $_SESSION['id'] = $idUser;
    }

    function Verify(){
        if(isset($_SESSION['id'])){
            return $_SESSION['id'];
        }else{
            return null;
        }
    }

    function Destroy(){

    }
}