<?php

class DB
{
    private $config = ["localhost", "root", "", "db3"];

    /**
     * dbconect quarda a conexao com banco de dados
     * Pode ser reutilizado
     */
    public $dbconect = null;
    public $result = null;
    public $comand = null;
    public $resultArray = null;


    /**
     * Conect conecta no bando de dados e cria o dbconect 
     * quardando a conecxão 
     */
    public function Conect()
    {
        // Função que coneta no bando de dados ou New Mysqli
        try {

            $this->dbconect = new mysqli($this->config[0], $this->config[1], $this->config[2], $this->config[3]);
        } catch (Exception $e) {
            echo "Erro Database Desligada Ligue a Database";
        }
    }

    /**
     * Apenas envia uma query para bando de dados,
     * query deve estar previamente formatada para sql.
     * @comand adiciona o comando usando DB -> comand = SqlComando;
     */
    public function sendComand()
    {    
            $this->Conect();
        try {
            $this->result = $this->dbconect->query($this->comand);

            if ($this->result === true) {
                $this->resultArray = $this->result;
            } else {
                $this->resultArray = mysqli_fetch_all($this->result);
            }
        } catch (Exception $e) {
            echo 'erro';
        };
    }

    /**
     * Construtor Principal que recebe o comando e conecta a db e envia.
     * OBS,Tambem fecha a coneção.
     * @param string deve estar formatado para SQL
     */
    public function __construct($comand)
    {
        $this->comand = $comand;
        $this->sendComand();
        $this->dbconect->close();
    }
};
