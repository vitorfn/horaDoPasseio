<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/AnimalDAO.php';


$idAnimal =  $_POST['idAnimal'];

$conexao = new Connection();
$conexao = $conexao->getConnection();


$animaldao = new AnimalDAO();
$res = $animaldao->ConsultarAnimal($idAnimal, $conexao);
//controller passivo de mudança

if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e alterar</title></head>
<body><h1>Consultar e alterar</h1>
<form action='../Controllers/C_alterarAnimalDefinitivo.php' method='POST''>
    Id Animal: <input type='text' name='idAnimal' value='" . $registro['idAnimal'] ."' readonly=“true”><br><br>
    Nome Animal: <input type='text' name='nomeAnimal' value='" . $registro['nomeAnimal'] . "'><br><br>
    Ano Nascimento: <input type='text' name='anoNascimento' value='" . $registro['anoNascimento'] . "'><br><br>
    Observações: <input type='text'  name='observacoes' value='" . $registro['observacoes'] . "'> <br><br>
    Especie: <input type='text'  name='especie' value='" . $registro['especie'] . "'> <br><br>
    Raca: <input type='text' name='raca' value='" .$registro['raca'] . "'> <br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Alterar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhum animal encontrado!');document.location='../index.html'</script>";
}

?>