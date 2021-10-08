<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ServicoExtraDAO.php';

var_dump($_GET);

$idReserva =  $_GET['idReserva'];


$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$servicoextradao = new ServicoExtraDAO();
$resultado = $servicoextradao->ConsultarServicoExtra($idReserva, $conexao);

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
                <th>Id Servico</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Id Reserva</th>
                <th>Data Serviço</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idReserva'] . "</td>" .
             "<td>" . $registro['descricao'] . "</td>" .
             "<td>" . $registro['valor'] . "</td>" .
             "<td>" . $registro['idReserva'] . "</td>" .
             "<td>" . $registro['dataServico'] . "</td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhum serviço encontrado!');document.location='../index.html'</script>";
}

?>