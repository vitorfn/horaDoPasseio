<?php
// Classe destinada a conexão com o banco de dados
class Connection {
    //Definição de todos os atributos do banco de dados
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $bd = "horaDoPasseio";
    private $connectDB = null;
    
    function __contruct(){ }

    function getConnection() {
        if ($this->connectDB == null) {
            $this->connectDB = mysqli_connect($this->servername,$this->username,$this->password,$this->bd);
        }
        if(!$this->connectDB) {
            die("conexao falhou" . $connectDB->connect_error);
        }
        return $this->connectDB;
    }
}

?>