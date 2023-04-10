<?php


abstract class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "estudoherancaphp";
    public int $port = 3306;
    public object $connect;
    public function connectDb()
    {
        try {
            //Conexão com a porta 
            /*$this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . 
            ';dbname=' . $this->dbname, $this->user, $this->pass);*/

            //Conexão sem a porta 
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);

            //echo "Conexão com banco de dados realizada com sucesso! <br>";
            return $this->connect;
        } catch (Exception $err) {
            die('Erro: Por favor, tente novamente. Caso o problema persistir, entre em contato com o administrador rafael@teste.com  ');
            //echo " Erro: Conexão com banco de dados não realizada com sucesso! Erro gerado:  " . $err->getMessage();
        }
    }
}
