<?php
include_once '../Persistence/Connection.php';
include_once '../Persistence/ReservaDAO.php';

$idReserva =  $_POST['idReserva'];

 
$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$reservadao = new ReservaDAO();
$resultado = $reservadao->ConsultarReserva($idReserva, $conexao);

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
                <th>Data de entrada</th>
                <th>Data de saida</th>
                <th>CPF</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idReserva'] . "</td>" .
             "<td>" . $registro['dataEntrada'] . "</td>" .
             "<td>" . $registro['dataSaida'] . "</td>" .
             "<td>" . $registro['CPF'] . "</td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhuma reserva encontrada!');document.location='../index.html'</script>";
}

?>