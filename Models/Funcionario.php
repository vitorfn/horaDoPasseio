<?php

class Funcionario {
    //atributos da classe funcionario
    private $CPF;
    private $nomeFunc;
    private $email;
    private $data_Nasc;
    private $senha;
    private $telefone;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($CPF, $nomeFunc, $email, $data_Nasc, $senha, $telefone) {
        $this->CPF = $CPF;
        $this->nomeFunc = $nomeFunc;
        $this->email = $email;
        $this->data_Nasc = $data_Nasc;
        $this->senha = $senha;
        $this->telefone = $telefone;
    }

    function getCPF() {
        return $this->CPF;
    }
    function getnomeFunc() {
        return $this->nomeFunc;
    }
    function getEmail() {
        return $this->email;
    }
    function getdata_Nasc() {
        return $this->data_Nasc;
    }
    function getSenha() {
        return $this->senha;
    }
    function getTelefone() {
        return $this->telefone;
    }
    
}
?>