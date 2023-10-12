<?php
class Arrayloop{
    function __construct($resultArray){
        if(array_key_exists(0,$resultArray)){
            for ($i=0; $i < count($resultArray) ; $i++) { 
                echo "<p>" . $resultArray[$i] . "</p>";
            }
        }else{

        }
    }
}