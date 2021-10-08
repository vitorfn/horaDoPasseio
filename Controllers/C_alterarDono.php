<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/DonoDAO.php';


$cpf =  $_POST['CPF'];

$conexao = new Connection();
$conexao = $conexao->getConnection();


$donodao = new DonoDAO();
$res = $donodao->ConsultarDono($cpf, $conexao);
//controller passivo de mudança

if ($res->num_rows > 0) {
    $registro = $res->fetch_assoc();
echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Consultar e alterar</title></head>
<body><h1>Consultar e alterar</h1>
<form action='../Controllers/C_alterarDonoDefinitivo.php' method='POST''>
    CPF: <input type='text' name='CPF' value='" . $registro['CPF'] ."' readonly=“true”><br><br>
    Nome: <input type='text' name='nome' value='" . $registro['nome'] . "'><br><br>
    Telefone: <input type='text' name='telefone' value='" . $registro['telefone'] . "'><br><br>
    E-mail: <input type='text'  name='email' value='" . $registro['email'] . "'> <br><br>
    Nascimento: <input type='date'  name='data_nascimento' value='" . $registro['data_nascimento'] . "'> <br><br>
    Endereço: <input type='text' name='endereco' value='" .$registro['endereco'] . "'> <br><br>
    Telefone: <input type='text'  name='telefone' value='" . $registro['telefone'] . "'> <br><br>
        <input type='hidden' value='inserir'/>
        <input type='submit' value='Alterar' name='cadastrar'/>
</form>
<a href='../index.html'>Voltar Para o Menu Principal</a>
</body>
</html>";

}else {
    echo "<script> alert('Nenhum dono encontrado!');document.location='../index.html'</script>";
}

?>