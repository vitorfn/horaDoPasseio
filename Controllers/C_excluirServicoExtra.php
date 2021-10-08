<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ServicoExtraDAO.php';

//variavel para pegar id do serviço extra
$idServico =  $_POST['idServico'];


//conexao com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();

//nova instancia da serviço extra
$servicoExtradao = new ServicoExtraDAO();
$res = $servicoExtradao->ConsultarServicoExtra($idServico, $conexao);


if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e Deletar</title></head>
<body><h1>Consultar e deletar</h1>
<form action='../Controllers/C_excluirServicoExtraDefinitivo.php' method='POST''>
    Id Serviço Extra: <input type='text' name='idServico' value='" . $registro['idServico'] ."' readonly=“true”><br><br>
    Descrição: <input type='text' name='descricao' value='" . $registro['descricao'] . "'><br><br>
    Valor: <input type='text'  name='valor' value='" . $registro['valor'] . "'> <br><br>
    id Reserva: <input type='text'  name='idReserva' value='" . $registro['idReserva'] . "'> <br><br>
    Data Serviço: <input type='date'  name='dataServico' value='" . $registro['dataServico'] . "'> <br><br>   
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Deletar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhum serviço extra encontrado!');document.location='../index.html'</script>";
}

?>