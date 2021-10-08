<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/AcomodacaoDAO.php';


$idQuarto =  $_POST['idQuarto'];

$conexao = new Connection();
$conexao = $conexao->getConnection();


$acomodacaodao = new AcomodacaoDAO();
$res = $acomodacaodao->ConsultarAcomodacao($idQuarto, $conexao);
//controller passivo de mudança

if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e alterar</title></head>
<body><h1>Consultar e alterar</h1>
<form action='../Controllers/C_alterarAcomodacaoDefinitivo.php' method='POST''>
    Id Quarto: <input type='text' name='idQuarto' value='" . $registro['idQuarto'] ."' readonly=“true”><br><br>
    Capacidade: <input type='text' name='capacidade' value='" . $registro['capacidade'] . "'><br><br>
    Valor: <input type='text' name='valor' value='" . $registro['valor'] . "'><br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Alterar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhuma acomodação encontrada!');document.location='../index.html'</script>";
}

?>