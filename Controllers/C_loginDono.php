<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/DonoDAO.php';

$CPF = $_POST['CPF'];
$senha = $_POST['senha'];

//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe AcomodacaoDAO
$donodao = new DonoDAO();
//Chamando função pra consultar todas as acomodacões
$resultado = $donodao->Login($conexao, $CPF, $senha);
if ($resultado->num_rows > 0) { 
    echo "<script> alert('Login realizado com sucesso! Redirecionando para o sistema.');document.location='../Views/index-dono.php?CPF=".$CPF."' </script>";
}

else {
    echo "<script> alert('Erro ao realizar o login! Verifique o seu usuário e senha!');document.location='../Views/login.html'</script>";
}

?>