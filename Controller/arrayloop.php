<?php
class Arrayloop{
    function __construct($resultArray){

        if(array_key_exists(0,$resultArray)){
            
                for($i= 0 ; $i < count($resultArray) ; $i++){
                    //var_dump($resultArray[$i]);
                    $this -> repeat($resultArray[$i]);
            }
        }else{
            
        }
    }
    function repeat($db){
        for ($i=0; $i < count($db) ; $i++) { 
            echo "<p>" . $db[$i] . "</p>";
        }
    }
}