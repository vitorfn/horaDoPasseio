<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/AcomodacaoDAO.php';

$idQuarto =  $_POST['idQuarto'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$acomodacaodao = new AcomodacaoDAO();
$resultado = $acomodacaodao->DeletarAcomodacao($idQuarto, $conexao);

?>