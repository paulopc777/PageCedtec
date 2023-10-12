<?php
class DB
{
    private $config = ["localhost", "root", "", "db1"];
    public $dbconect = null;
    public $result = null;
    public $comand = null;
    public $resultArray = null;

    public function Conect()
    {
        try {
            $this -> dbconect = new mysqli($this -> config[0], $this -> config[1], $this -> config[2], $this -> config[3]);
        } catch (Exception $err) {
            echo "erro ao corregar db 1.Db desligada";
        }
    }
    public function sendComand()
    {
        $this -> Conect();
        $this -> result = $this -> dbconect-> query($this -> comand);
        $this -> resultArray = mysqli_fetch_row($this -> result);
    }

    public function __construct($comand){
        $this -> comand = $comand;
        $this -> sendComand();
    }
};
