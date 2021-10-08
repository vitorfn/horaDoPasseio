<?php

class ServicoExtra {
    //atributos da classe servico extra
    private $idServico;
    private $descricao;
    private $valor;
    private $idReserva;
    private $dataServico;

    //Construtor que recebe como parametro os valores dos atributos
    function __construct($descricao, $valor, $idReserva, $dataServico) {
        $this->descricao = $descricao;
        $this->valor = $valor;
        $this->idReserva = $idReserva;
        $this->dataServico = $dataServico;
    }

    function getIdServico() {
        return $this->idServico;
    }
    function getdescricao() {
        return $this->descricao;
    }
    function getvalor() {
        return $this->valor;
    }
    function getIdReserva() {
        return $this->idReserva;
    }
    function getDataServico(){
        return $this->dataServico;
    }

}
?>