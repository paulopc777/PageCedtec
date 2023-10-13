<?php

class Sension{

    function Start($id){

        session_start();

        $_SESSION['id'] = $id;

        return $_SESSION['id'];

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