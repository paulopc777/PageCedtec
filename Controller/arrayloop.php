<?php
class Arrayloop
{

    function __construct($case, $resultArray)
    {

        switch ($case) {
            case 0:
                $this->repeat($resultArray, "simpleEcho");
                break;
            case 1:
                $this->repeat($resultArray, "divCurso");
                break;
            case 2:
                $this->repeat($resultArray, "Card");
                break;
        }
    }
    function repeat($resultArray, $func)
    {

        if (array_key_exists(0, $resultArray)) {
            for ($i = 0; $i < count($resultArray); $i++) {
                $this->$func($resultArray[$i]);
            }
        } else {
        }
    }



    function simpleEcho($db)
    {

        for ($i = 0; $i < count($db); $i++) {
            echo "<p>" . $db[$i] . "</p>";
        }
    }

    function divCurso($resultArray)
    {
        $color = '';

        if (strpos($resultArray[0], "Python") !== false) {
            $color =  "#11162F";
        } else if (!strpos($resultArray[0], "Java") !== false) {
            $color =  "#ac1014";
        }
        $arra = explode(',', $resultArray[2]);
        echo "
        <div class='curso-1' style='background:" . $color . ";'>
                    <div class='Curso-img'>
                        <a href=''>
                            <img src='/Public/img/img-curso-small/" . $resultArray[0] . "' alt=''>
                        </a>
                    </div>
                    <div class='Curso-text'>
                        <ul>
                            <li>" .  $arra[0] . "</li>
                            <li>" . $arra[1] . "</li>
                            <li>" . $arra[2] . "</li>
                        </ul>
                    </div>
                </div>
            ";
    }
    function Card($result)
    {
        $texto = $result[0];
        $texto_corrigido = str_replace(" ", "_", $texto); // Substituir espaços por underscores
        echo "
        <div class='card' style='width: 10rem;'>
        <img src='/Public/img/img-curso-small/" . $result[2] . "' class='card-img-top' alt='...'>
            <div class='card-body'>
            <h5 class='card-title'>" . $result[0] . "</h5>
            <p class='card-text'>" . $result[1] . "</p>
            <a href='/Curso/" .  $texto_corrigido . "' class='btn btn-primary'>Ver mais</a>
        </div>
        </div>";
    }
}
