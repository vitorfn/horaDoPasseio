<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Acomodacao.php';
include_once '../Persistence/AcomodacaoDAO.php';

$capacidade = $_POST['capacidade'];
$valor =  $_POST['valor'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Acomodacao($capacidade, $valor);
 
$acomodacaodao = new AcomodacaoDAO();
$acomodacaodao->SalvarAcomodacao($f, $conexao);

?>