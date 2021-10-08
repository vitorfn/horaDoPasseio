<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Funcionario.php';
include_once '../Persistence/FuncionarioDAO.php';

$CPF = $_POST['CPF'];
$nomeFunc = $_POST['nomeFunc'];
$email =  $_POST['email'];
$data_Nasc = $_POST['data_Nasc'];
$telefone = $_POST['telefone'];
$senha = null;

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Funcionario($CPF, $nomeFunc, $email, $data_Nasc, $senha, $telefone);

$funcionariodao = new FuncionarioDAO();
$resultado = $funcionariodao->AlterarFuncionario($f, $conexao);

if ($resultado == true) {
    echo "<script> alert('Funcionário alterado com sucesso!');document.location='../index.html'</script>";
}else {
    echo "erro no update" . "<br>" . $conexao->error;
}

?>