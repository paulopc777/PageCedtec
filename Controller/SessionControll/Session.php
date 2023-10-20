<?php

class Sension
{

    function Start($id)
    {

        session_start();

        $_SESSION['id'] = $id;

        return $_SESSION['id'];
    }

    function Verify()
    {
        if (!empty($_SESSION['id'])) {
            return $_SESSION['id'];
        } else {
            return null;
        }
    }

    function Destroy()
    {
        if (!empty($_SESSION['id'])) {
            unset($_SESSION['id']);
            $_SESSION = array();
        } else {
        }
    }
}
