<?php

class Animal {
    //atributos da classe dono
    private $idAnimal;
    private $nomeAnimal;
    private $anoNascimento;
    private $observacoes;
    private $especie;
    private $raca;
    private $CPF;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($nomeAnimal, $anoNascimento, $observacoes, $especie, $raca, $CPF) {
        $this->nomeAnimal = $nomeAnimal;
        $this->anoNascimento = $anoNascimento;
        $this->observacoes = $observacoes;
        $this->especie = $especie;
        $this->raca = $raca;
        $this->CPF = $CPF;
    }

    function getIdAnimal() {
        return $this->idAnimal;
    }
    function getNomeAnimal() {
        return $this->nomeAnimal;
    }
    function getAnoNascimento() {
        return $this->anoNascimento;
    }
    function getObservacoes() {
        return $this->observacoes;
    }
    function getEspecie() {
        return $this->especie;
    }
    function getRaca() {
        return $this->raca;
    }
    function getCPF() {
        return $this->CPF;
    }
}
?>