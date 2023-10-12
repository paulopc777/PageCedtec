# PageCedtec

## Pagina de Cursode anailze e desenvolvimento de sistemas da cedtec 


  session_start();
    if($_SESSION["newsession"] === "Loged"){
    }else{
        $_SESSION["newsession"] = "notLoged";
    }
    echo $_SESSION["newsession"];