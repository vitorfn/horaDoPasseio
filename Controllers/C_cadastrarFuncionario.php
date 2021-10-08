<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Funcionario.php';
include_once '../Persistence/FuncionarioDAO.php';

$CPF = $_POST['CPF'];
$nomeFunc = $_POST['nomeFunc'];
$email =  $_POST['email'];
$data_Nasc = $_POST['data_Nasc'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Funcionario($CPF, $nomeFunc, $email, $data_Nasc, $senha, $telefone);
 
$funcionariodao = new FuncionarioDAO();
$funcionariodao->SalvarFuncionario($f, $conexao);

?>