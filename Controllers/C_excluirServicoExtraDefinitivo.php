<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ServicoExtraDAO.php';

$idServico =  $_POST['idServico'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$servicoextradao = new ServicoExtraDAO();
$resultado = $servicoextradao->DeletarServicoExtra($idServico, $conexao);

?>