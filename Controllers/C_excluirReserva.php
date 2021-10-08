<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ReservaDAO.php';

//variavel para pegar id da reserva
$idReserva =  $_POST['idReserva'];


//conexao com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection(); 

//nova instancia da reserva
$reservadao = new ReservaDAO();
$res = $reservadao->ConsultarReserva($idReserva, $conexao);


if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e Deletar</title></head>
<body><h1>Consultar e deletar</h1>
<form action='../Controllers/C_excluirReservaDefinitivo.php' method='POST''>
    Id Reserva: <input type='text' name='idReserva' value='" . $registro['idReserva'] ."' readonly=“true”><br><br>
    Data de Entrada: <input type='date' name='dataEntrada' value='" . $registro['dataEntrada'] . "'><br><br>
    Data de Saida: <input type='date' name='dataSaida' value='" . $registro['dataSaida'] . "'><br><br>
    CPF: <input type='text'  name='CPF' value='" . $registro['CPF'] . "'> <br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Deletar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhuma reserva encontrada!');document.location='../index.html'</script>";
}

?>