<?php
//incluindo respectivas funções
include_once '../Persistence/Connection.php';
include_once '../Persistence/AcomodacaoDAO.php';
//conectando com o banco
$conexao = new Connection();
$conexao = $conexao->getConnection();
//Criando uma instancia da Classe AcomodacaoDAO
$acomodacaodao = new AcomodacaoDAO();
//Chamando função pra consultar todas as acomodacões
$resultado = $acomodacaodao->ConsultarTodassAcomodacoes($conexao);
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
                <th>ID Quarto</th>
                <th>Capacidade</th>
                <th>Valor</th>
              </tr>
              <?php 
    while ($registro = $resultado->fetch_assoc() ) {
        echo "<tr>";
        echo 
             "<td>" . $registro['idQuarto'] . "</td>" .
             "<td>" . $registro['capacidade'] . "</td>" . 
             "<td>" . $registro['valor'] ."</td>";
        echo "</tr>";
    }
    echo "</table><br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a></body></html>";
}

else {
  echo "<script> alert('Nenhuma acomodação encontrada!');document.location='../index.html'</script>";
}

?>