<?php
include_once '../Persistence/Connection.php';
include_once '../Models/Reserva.php';
include_once '../Persistence/ReservaDAO.php';

$dataEntrada =  $_POST['dataEntrada'];
$dataSaida =  $_POST['dataSaida'];
$CPF =  $_POST['CPF'];
$idAnimal =  $_POST['idAnimal'];

$conexao = new Connection();
$conexao = $conexao->getConnection();
 
$reservadao = new ReservaDAO();
$resultado = $reservadao->ConsultarQuartosAptos($conexao, $dataEntrada, $dataSaida);

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
                <th>Id Quarto</th>
                <th>Capacidade</th>
                <th>Valor</th>
                <th>Selecionar</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "
        <form action='../Controllers/C_cadastrarReservaDefinitivo.php' method='POST''>
        
        <tr>
        <td><input type='hidden' name='idQuarto' value='" . $registro['idQuarto'] ."' readonly=“true”>
        ".$registro['idQuarto']."
        </td>
        <td><input type='hidden' name='capacidade' value='" . $registro['capacidade'] . "'>
        ".$registro['capacidade']."
        </td>
        <td><input type='hidden' name='valor' value='" . $registro['valor'] . "'>
        ".$registro['valor']."
        </td>
        <input type='hidden' name='dataEntrada' value='$dataEntrada'/>
        <input type='hidden' name='dataSaida' value='$dataSaida'/>
        <input type='hidden' name='CPF' value='$CPF'/>
        <input type='hidden' name='idAnimal' value='$idAnimal'/>
        <td><input type='submit' value='Selecionar' name='selecionar'/></td>
        
        </tr>";
    }
    echo "</form></table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhuma acomodação encontrada!');document.location='../index.html'</script>";
}

?>