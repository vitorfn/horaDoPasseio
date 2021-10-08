<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ReservaDAO.php';

$idReserva =  $_POST['idReserva'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
  
$reservadao = new ReservaDAO();
$resultado = $reservadao->DeletarReserva($idReserva, $conexao);

?>