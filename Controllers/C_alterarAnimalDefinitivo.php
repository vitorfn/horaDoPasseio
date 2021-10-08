<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Animal.php';
include_once '../Persistence/AnimalDAO.php';

$idAnimal = $_POST['idAnimal'];
$nomeAnimal = $_POST['nomeAnimal'];
$anoNascimento =  $_POST['anoNascimento'];
$observacoes = $_POST['observacoes'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$f = new Animal($nomeAnimal, $anoNascimento, $observacoes, $especie, $raca);

$animaldao = new AnimalDAO();
$resultado = $animaldao->AlterarAnimal($f, $conexao, $idAnimal);

if ($resultado == true) {
    echo "<script> alert('Animal alterado com sucesso!');document.location='../index.html'</script>";
}else {
    echo "erro no update" . "<br>" . $conexao->error;
}

?>