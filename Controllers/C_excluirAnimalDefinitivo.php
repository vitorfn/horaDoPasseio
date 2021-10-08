<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/AnimalDAO.php';

$idAnimal =  $_POST['idAnimal'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$animaldao = new AnimalDAO();
$resultado = $animaldao->DeletarAnimal($idAnimal, $conexao);

?>