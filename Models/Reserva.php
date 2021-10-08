<?php

class Reserva {
    //atributos da classe reserva
    private $idReserva;
    private $dataEntrada;
    private $dataSaida;
    private $CPF;
    private $idQuarto;
    private $idAnimal;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($dataEntrada, $dataSaida, $CPF, $idQuarto, $idAnimal) {
        $this->dataEntrada = $dataEntrada;
        $this->dataSaida = $dataSaida;
        $this->CPF = $CPF;
        $this->idQuarto = $idQuarto;
        $this->idAnimal = $idAnimal;
    }

    function getIdReserva() {
        return $this->idReserva;
    }
    function getDataEntrada() {
        return $this->dataEntrada;
    }
    function getDataSaida() {
        return $this->dataSaida;
    }
    function getCPF() {
        return $this->CPF;
    }
    function getIdQuarto() {
        return $this->idQuarto;
    }
    function getIdAnimal() {
        return $this->idAnimal;
    }
}
?>