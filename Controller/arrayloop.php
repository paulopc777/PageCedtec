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
            case 3:
                $this->repeat($resultArray, "ListProf");
                break;
            case 4:
                $this->repeat($resultArray, "CurseList");
                break;
            case 5:
                $this->repeat($resultArray, "modules");
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
        $image = imagecreatefrompng('./Public/img/img-curso-small/' . $resultArray[0]);

        $width = imagesx($image);
        $height = imagesy($image);
        $colorCount = array();
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $color = imagecolorat($image, $x, $y);
                $colorRGB = imagecolorsforindex($image, $color);

                $colorKey = $colorRGB['red'] . '-' . $colorRGB['green'] . '-' . $colorRGB['blue'];

                if (isset($colorCount[$colorKey])) {
                    $colorCount[$colorKey]++;
                } else {
                    $colorCount[$colorKey] = 1;
                }
            }
        }
        arsort($colorCount);
        $predominantColor = explode('-', array_key_first($colorCount));
        // A cor predominante agora está em $predominantColor
        $red = $predominantColor[0];
        $green = $predominantColor[1];
        $blue = $predominantColor[2];

        $averageColor = ($red + $green + $blue) / 3;

        // Defina um valor limite para determinar se a cor é clara ou escura
        $threshold = 128;

        if($averageColor >= $threshold){
            $textColor = "#351A1F";
        }else{
            $textColor = "#935066";
        }
        // Defina a cor do texto com base na média das componentes de cor
        //$textColor = $averageColor > $threshold ? 'black' : 'white';

        $arra = explode(',', $resultArray[2]);

        echo "
        <div class='curso-1'  style='background-color:rgb(" . $red . "," . $green . "," . $blue . ");'>
                    <div class='Curso-img'>
                        <a href=''>
                            <img src='/Public/img/img-curso-small/" . $resultArray[0] . "' alt=''>
                        </a>
                    </div>
                    <div class='Curso-text'>
                        <ul >
                            <li style='color:".$textColor.";'>" .  $arra[0] . "</li>
                            <li style='color:".$textColor.";'>" . $arra[1] . "</li>
                            <li style='color:".$textColor.";'>" . $arra[2] . "</li>
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
        <div class='card' style='width: 10rem; he'>
        <img src='/Public/img/img-curso-small/" . $result[2] . "' class='card-img-top' alt='...'>
            <div class='card-body d-flex flex-column justify-content-center'>
            <h5 class='card-title text-center'>" . $result[0] . "</h5>
            <p class='card-text text-center '>" . $result[1] . "</p>
            <a href='/Curso/" .  $texto_corrigido . "' class='btn btn-primary'>Ver mais</a>
        </div>
        </div>";
    }

    function ListProf($result)
    {
        echo "
        <div class='box-Professor'>
            <div class='img-prof'>
            </div>
            <p>" . $result[1] . "</p>
        </div>
        ";
    }

    function CurseList($result)
    {

        $image = imagecreatefrompng('./Public/img/img-curos-full/' . $result[3]);

        $width = imagesx($image);
        $height = imagesy($image);
        $colorCount = array();
        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {
                $color = imagecolorat($image, $x, $y);
                $colorRGB = imagecolorsforindex($image, $color);

                $colorKey = $colorRGB['red'] . '-' . $colorRGB['green'] . '-' . $colorRGB['blue'];

                if (isset($colorCount[$colorKey])) {
                    $colorCount[$colorKey]++;
                } else {
                    $colorCount[$colorKey] = 1;
                }
            }
        }
        arsort($colorCount);
        $predominantColor = explode('-', array_key_first($colorCount));
        // A cor predominante agora está em $predominantColor
        $red = $predominantColor[0];
        $green = $predominantColor[1];
        $blue = $predominantColor[2];
        $averageColor = ($red + $green + $blue) / 3;

        // Defina um valor limite para determinar se a cor é clara ou escura
        $threshold = 128;

        if($averageColor >= $threshold){
            $textColor = "#351A1F";
        }else{
            $textColor = "white";
        }

        $arra = explode(',', $result[2]);

        $texto = $result[0];
        $texto_corrigido = str_replace(" ", "_", $texto);

        echo "
        <div class='card mb-3' style=' margin-top:3rem;background-color:rgb(".$red.",".$green.",".$blue.")'>
            <div class='row g-0'>
                    <div class='col-md-4'>
                        <img src='/Public/img/img-curos-full/" . $result[3] . "' class='img-fluid rounded-start' alt='" . $result[0] . "' style='
                        max-height: 100%; 
                        object-fit: cover;
                        height: 100%;
                        ' >
                    </div>
                <div class='col-md-8'>
                        <div class='card-body'>
                                <h5 class='card-title' style='color:".$textColor."'>" . $result[0] . "</h5>
                                <ul class='list-group'>
                                    <li class='list-group-item'>$arra[0]</li>
                                    <li class='list-group-item'>$arra[1]</li>
                                    <li class='list-group-item'>$arra[2]</li>
                                </ul>
                                <p class='card-text'><small class='text-body-secondary'></small></p>
                        </div>
                </div>
            </div>
            <div style='margin:1rem;' class='d-flex justify-content-center'>
                <button type='button' class='btn btn-success'><a href='Curso/" . $texto_corrigido . "'>Inscrevase</a></button>
            </div>
        </div>
        ";

        /** 
       // echo "
        <div class='card mb-3'>
        <img src='/Public/img/img-curos-full/".$result[3]."' class='card-img-top' alt='".$result[0]."' style='max-height: 250px;'>
        <div class='card-body'>
            <h4 class='card-title text-center'>" . $result[0] . "</h4>
            <h5 class='card-title text-center'>".$result[1]."</h5>
            <ul class='list-group'>
                <li class='list-group-item'>$arra[0]</li>
                <li class='list-group-item'>$arra[1]</li>
                <li class='list-group-item'>$arra[2]</li>
            </ul>          
            <p class='card-text'><small class='text-body-secondary'>Last updated 3 mins ago</small></p>
        </div>
    </div>
        
       ";
        #
         */
    }


    function modules($result)
    {

        $arra = explode(",", $result[3]);
        $arra2 = explode(",", $result[4]);

        $resultado = array();

        // Intercale os elementos dos dois arrays
        $maxCount = max(count($arra), count($arra2));
        for ($i = 0; $i < $maxCount; $i++) {
            if (isset($arra[$i])) {
                $resultado[] = $arra[$i];
            }
            if (isset($arra2[$i])) {
                $resultado[] = $arra2[$i];
            }
        }

        for ($i = 0; $i < count($resultado); $i++) {
            echo "
        <div class='box-modulos'>
            <div class='modulos-check'>
                <p>
                    ✔️
                </p>
            </div>
            <div class='text-modulo'>
                <p>
                    " . $resultado[$i] . "
                </p>
            </div>
        </div>
        
        ";
        }
    }
}
