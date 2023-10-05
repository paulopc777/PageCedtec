<?php
class Find
{
    private $config = ["localhost", "root", "", "db1"];
    public $dbconect = null;
    public $result = null;
    public function Veryfi()
    {
        try {
            $this -> dbconect = new mysqli($this -> config[0], $this -> config[1], $this -> config[2], $this -> config[3]);
            echo "conected";
        } catch (Exception $err) {
            echo "erro ao corregar db " . $err;
        }
    }
    function sendComand($comand)
    {
        $this -> Veryfi();
        $this -> result = $this -> dbconect->query($comand);
    }
};
