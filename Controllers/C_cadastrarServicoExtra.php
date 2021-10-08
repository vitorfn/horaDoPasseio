<?php
include_once '../Persistence/Connection.php';
include_once '../Models/ServicoExtra.php';
include_once '../Persistence/ServicoExtraDAO.php';


$descricao =  $_POST['descricao'];
$valor =  $_POST['valor'];
$idReserva =  $_POST['idReserva'];
$dataServico =  $_POST['dataServico'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new ServicoExtra($descricao, $valor, $dataServico, $idReserva);
 
$servicoextradao = new ServicoExtraDAO();
$servicoextradao->SalvarServicoExtra($f, $conexao);

?>