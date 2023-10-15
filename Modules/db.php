<?php
class DB
{
    private $config = ["localhost", "root", "", "db2"];
    public $dbconect = null;
    public $result = null;
    public $comand = null;
    public $resultArray = null;

    public function Conect()
    {
        try {
            $this->dbconect = new mysqli($this->config[0], $this->config[1], $this->config[2], $this->config[3]);
        } catch (Exception $err) {
            echo "erro ao corregar db <br> 1.Db desligada";
        }
    }
    public function sendComand()
    {
        $this->Conect();
        try{
            $this->result = $this->dbconect->query($this->comand);

            if($this->result === true){
                $this->resultArray = $this->result ;
            }else{
                $this->resultArray = mysqli_fetch_all($this->result);
            }
        }catch(Exception $e){
            echo 'erro';
        };       
    }

    public function __construct($comand)
    {
        $this->comand = $comand;
        $this->sendComand();
        $this -> dbconect ->close();
    }
};

