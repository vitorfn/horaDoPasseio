<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/DonoDAO.php';
//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe FuncionarioDAO
$donodao = new DonoDAO();
//Chamando função pra consultar todos funcionarios
$resultado = $donodao->ConsultarTodosDonos($conexao);
if ($resultado->num_rows > 0) { ?>
  <html>
            <head>
            <style>
              table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }
              td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
              }
              tr:nth-child(even) {
                background-color: #dddddd;
              }
             </style>
             </head>
             <body>
             <table>
              <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Senha</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['CPF'] . "</td>" .
             "<td>" . $registro['nome'] . "</td>" . 
             "<td>" . $registro['telefone'] . "</td>".
             "<td>" . $registro['email'] ."</td>" .
             "<td>" . $registro['data_nascimento'] . "</td>" .
             "<td>" . $registro['endereco'] . "</td>" .
             "<td>" . $registro['senha'] . "</td>" ;
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhum dono encontrado!');document.location='../index.html'</script>";
}

?>