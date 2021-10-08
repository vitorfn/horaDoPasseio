<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/FuncionarioDAO.php';

$cpf =  $_POST['CPF'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$funcionariodao = new FuncionarioDAO();
$resultado = $funcionariodao->DeletarFuncionario($cpf, $conexao);

?>