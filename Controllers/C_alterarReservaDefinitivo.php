<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Reserva.php';
include_once '../Persistence/ReservaDAO.php';

$idReserva = $_POST['idReserva']; 
$dataEntrada = $_POST['dataEntrada'];
$dataSaida =  $_POST['dataSaida'];
$CPF =  $_POST['CPF'];
$idAnimal =  $_POST['idAnimal'];
$idQuarto =  $_POST['idQuarto'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Reserva($dataEntrada, $dataSaida, $CPF, $idQuarto, $idAnimal);

$reservadao = new ReservaDAO();
$resultado = $reservadao->AlterarReserva($f, $conexao, $idReserva);

if ($resultado == true) {
    echo "<script> alert('Reserva alterada com sucesso!');document.location='../index.html'</script>";
}else {
    echo "erro no update" . "<br>" . $conexao->error;
}

?>