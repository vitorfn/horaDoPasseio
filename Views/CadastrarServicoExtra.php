<?php 
$idReserva =  $_GET['idReserva'];
?>

<!-- 
    Pagina destinada ao cadastro de acomodações;
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Entrada de dados</title>
        <style>
        .error {color: #FF0000;}
        </style>    
    </head>
<body>
    <!--Inicio do nosso formulario -->
    <h1>Formulario de cadastro</h1>
    <p><span class="error"> * Campos obrigatórios</span></p>
    <form action="../Controllers/C_cadastrarServicoExtra.php" method="POST">
    <!--$_SERVER["PHP_SELF"] é uma variável super global  -->
        Id Reserva: <input type='text' name='idReserva' value=<?php echo $idReserva ?> readonly=“true”><br><br>
        
        Descrição: <input type="text" placeholder="Entre com a descrição do serviço" name="descricao">
        <span class="error">*</span>
        <br><br>
        Valor: <input type="txt" placeholder="Entre com o valor do serviço" name="valor">
        <span class="error">*</span>
        <br><br> 
        Data: <input type="date"  name="dataServico">
        <span class="error">*</span>
        <br><br>
            <input type="hidden" value="inserir"/>
            <input type="submit" value="Cadastrar" name="cadastrar"/>
    </form>
    <br><br><br><a href='../index.html'>Voltar Para o Menu Principal</a>
</body>

</html>