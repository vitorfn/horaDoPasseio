<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/FuncionarioDAO.php';

$CPF = $_POST['CPF'];
$senha = $_POST['senha'];

//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe AcomodacaoDAO
$funcionariodao = new FuncionarioDAO();
//Chamando função pra consultar todas as acomodacões
$resultado = $funcionariodao->Login($conexao, $CPF, $senha);
if ($resultado->num_rows > 0) { 
    echo "<script> alert('Login realizado com sucesso! Redirecionando para o sistema.');document.location='../index.html'</script>";
}

else {
    echo "<script> alert('Erro ao realizar o login! Verifique o seu usuário e senha!');document.location='../index.html'</script>";
}

?>