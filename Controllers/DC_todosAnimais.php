<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/AnimalDAO.php';

$CPF = $_GET['CPF'];

//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe AnimalDAO
$animaldao = new AnimalDAO();
//Chamando função pra consultar todos animais
$resultado = $animaldao->ConsultarTodosAnimaisCPF($conexao, $CPF);
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
                <th>idAnimal</th>
                <th>nomeAnimal</th>
                <th>anoNascimento</th>
                <th>observacoes</th>
                <th>especie</th>
                <th>raca</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idAnimal'] . "</td>" .
             "<td>" . $registro['nomeAnimal'] . "</td>" . 
             "<td>" . $registro['anoNascimento'] . "</td>".
             "<td>" . $registro['observacoes'] ."</td>" .
             "<td>" . $registro['especie'] . "</td>" .
             "<td>" . $registro['raca'] . "</td>" ;
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhum animal encontrado!');document.location='../index.html'</script>";
}

?>