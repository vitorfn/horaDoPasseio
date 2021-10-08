<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/FuncionarioDAO.php';
//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe FuncionarioDAO
$funcionariodao = new FuncionarioDAO();
//Chamando função pra consultar todos funcionarios
$resultado = $funcionariodao->ConsultarTodosFuncionarios($conexao);
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
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['CPF'] . "</td>" .
             "<td>" . $registro['nomeFunc'] . "</td>" . 
             "<td>" . $registro['email'] ."</td>" .
             "<td>" . $registro['data_Nasc'] . "</td>" .
             "<td>" . $registro['telefone'] . "</td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhum funcionário encontrado!');document.location='../index.html'</script>";
}

?>