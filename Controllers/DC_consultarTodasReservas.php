<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/ReservaDAO.php'; 

$CPF = $_GET['CPF'];

//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe ReservaDAO
$reservadao = new ReservaDAO();
//Chamando função pra consultar todas as acomodacões
$resultado = $reservadao->ConsultarTodasReservasCPF($conexao, $CPF);
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
                <th>ID Reserva</th>
                <th>Data de Entrada</th>
                <th>Data de Saída</th>
                <th>CPF Dono</th>
                <th>Serviços Extras</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idReserva'] . "</td>" .
             "<td>" . $registro['dataEntrada'] . "</td>" .
             "<td>" . $registro['dataSaida'] . "</td>" . 
             "<td>" . $registro['CPF'] . "</td>" . 
             "<td><a href='C_gerenciarServicosExtras.php?idReserva=". $registro['idReserva']. "'>Gerenciar</a></td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhuma reserva encontrada!');document.location='../index.html'</script>";
}

?>