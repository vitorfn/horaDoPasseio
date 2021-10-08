<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/DonoDAO.php';

$cpf =  $_POST['CPF'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$donodao = new DonoDAO();
$resultado = $donodao->DeletarDono($cpf, $conexao);

?>