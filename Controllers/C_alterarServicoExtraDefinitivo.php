<?php
include_once '../Persistence/Connection.php';
include_once '../Models/ServicoExtra.php';
include_once '../Persistence/ServicoExtraDAO.php';

$idServico = $_POST['idServico'];
$descricao = $_POST['descricao'];
$valor =  $_POST['valor'];
$idReserva =  $_POST['idReserva'];
$dataServico =  $_POST['dataServico'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new ServicoExtra($descricao, $valor, $idReserva, $dataServico);

$servicoExtradao = new ServicoExtraDAO();
$resultado = $servicoExtradao->AlterarServicoExtra($f, $conexao, $idServico);

if ($resultado == true) {
    echo "<script> alert('Serviço extra alterado com sucesso!');document.location='../index.html'</script>";
}else {
    echo "erro no update" . "<br>" . $conexao->error;
}

?>