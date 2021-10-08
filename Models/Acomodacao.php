<?php

class Acomodacao {
    //atributos da classe acomodacao
    private $idQuarto;
    private $capacidade;
    private $valor;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($capacidade, $valor) {
        $this->capacidade = $capacidade;
        $this->valor = $valor;
    }

    function getIdAnimal() {
        return $this->idQuarto;
    }
    function getcapacidade() {
        return $this->capacidade;
    }
    function getvalor() {
        return $this->valor;
    }
}
?>