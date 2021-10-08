<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/ServicoExtraDAO.php';
//conectando com o banco
$idReserva = $_GET['idReserva'];
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe ServicoExtraDAO
$servicoextradao = new ServicoExtraDAO();
//Chamando função pra consultar todas as acomodacões
$resultado = $servicoextradao->ConsultarTodosServicosExtras($conexao, $idReserva);
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
                <th>ID Serviço</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Id Reserva</th>
                <th>Data Serviço</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idServico'] . "</td>" .
             "<td>" . $registro['descricao'] . "</td>" .
             "<td>" . $registro['valor'] . "</td>" .
             "<td>" . $registro['idReserva'] . "</td>" . 
             "<td>" . $registro['dataServico'] ."</td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  //echo "<script> alert('Nenhum serviço encontrado!');document.location='../index.html'</script>";
}

?>