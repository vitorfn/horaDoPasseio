<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/FuncionarioDAO.php';

//variavel para pegar valor do cpf
$cpf =  $_POST['CPF'];


//conexao com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();

//nova instancia do funcionario
$funcionariodao = new FuncionarioDAO();
$res = $funcionariodao->ConsultarFuncionario($cpf, $conexao);


if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e Deletar</title></head>
<body><h1>Consultar e deletar</h1>
<form action='../Controllers/C_excluirFuncDefinitivo.php' method='POST''>
    CPF: <input type='text' name='CPF' value='" . $registro['CPF'] ."' readonly=“true”><br><br>
    Nome: <input type='text' name='nomeFunc' value='" . $registro['nomeFunc'] . "'><br><br>
    E-mail: <input type='text'  name='email' value='" . $registro['email'] . "'> <br><br>
    Nascimento: <input type='date'  name='data_Nasc' value='" . $registro['data_Nasc'] . "'> <br><br>
    Telefone: <input type='text'  name='telefone' value='" . $registro['telefone'] . "'> <br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Deletar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhum funcionário encontrado!');document.location='../index.html'</script>";
}

?>