<?php

class Dono {
    //atributos da classe dono
    private $CPF;
    private $nome;
    private $telefone;
    private $email;
    private $data_nascimento;
    private $endereco;
    private $senha;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($CPF, $nome, $telefone, $email, $data_nascimento, $endereco, $senha) {
        $this->CPF = $CPF;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->data_nascimento = $data_nascimento;
        $this->endereco = $endereco;
        $this->senha = $senha;
    }

    function getCPF() {
        return $this->CPF;
    }
    function getnome() {
        return $this->nome;
    }
    function getTelefone() {
        return $this->telefone;
    }
    function getEmail() {
        return $this->email;
    }
    function getdata_nascimento() {
        return $this->data_nascimento;
    }
    function getEndereco() {
        return $this->endereco;
    }
    function getSenha() {
        return $this->senha;
    }
    
}
?>