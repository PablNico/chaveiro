<?php 
    //Verifica se já existe uma sessão iniciada.
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    abstract class Connection
    {
        //Atributos de acesso ao banco de dados local
        private $servDB = "mysql:host=localhost;dbname=chaveiro";
        private $user = "root";
        private $pass = "";

        //Atributos de acesso ao banco de dados no servidor
        // private $servDB = "mysql:host=localhost:3306;dbname=chaveiro2";
        // private $user = "mog";
        // private $pass = 'P$hb7g69';

        // Método abstrato, só pode ser chamado em classes que herdam de Connection
        protected function connect()
        {
            // Tenta conectar com os atributos definidos
            try
            {
                //Cria objeto PDO
                $conn = new PDO($this->servDB, $this->user,$this->pass);
                $conn->exec("set names utf8");
                return $conn;
            }
            catch(PDOException $erro)
            {
                $erro->getMessage();
            }
        }
    }
?>