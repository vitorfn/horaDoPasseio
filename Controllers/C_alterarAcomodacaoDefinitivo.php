<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Acomodacao.php';
include_once '../Persistence/AcomodacaoDAO.php';

$idQuarto = $_POST['idQuarto'];
$capacidade = $_POST['capacidade'];
$valor =  $_POST['valor'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Acomodacao($capacidade, $valor);

$acomodacaodao = new AcomodacaoDAO();
$resultado = $acomodacaodao->AlterarAcomodacao($f, $conexao, $idQuarto);

if ($resultado == true) {
    echo "<script> alert('Acomodação alterada com sucesso!');document.location='../index.html'</script>";
}else {
    echo "erro no update" . "<br>" . $conexao->error;
}

?>