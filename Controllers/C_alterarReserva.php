<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ReservaDAO.php';


$idReserva =  $_POST['idReserva']; 

$conexao = new Connection();
$conexao = $conexao->getConnection();


$reservadao = new ReservaDAO();
$res = $reservadao->ConsultarReserva($idReserva, $conexao);
//controller passivo de mudança

if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e alterar</title></head>
<body><h1>Consultar e alterar</h1>
<form action='../Controllers/C_alterarReservaDefinitivo.php' method='POST''>
    Id Reserva: <input type='text' name='idReserva' value='" . $registro['idReserva'] ."' readonly=“true”><br><br>
    Data Entrada: <input type='date' name='dataEntrada' value='" . $registro['dataEntrada'] . "'><br><br>
    Data Saida: <input type='date' name='dataSaida' value='" . $registro['dataSaida'] . "'><br><br>
    CPF: <input type='text' name='CPF' value='" . $registro['CPF'] . "'><br><br>
    ID Quarto: <input type='text' name='idQuarto' value='" . $registro['idQuarto'] . "'><br><br>
    ID Animal: <input type='text' name='idAnimal' value='" . $registro['idAnimal'] . "'><br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Alterar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhuma reserva encontrada!');document.location='../index.html'</script>";
}

?>