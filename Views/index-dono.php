<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hora do Passeio</title>
</head>

<?php $CPF = $_GET['CPF']; ?>

<body>
    <h1>Hora do Passeio</h1>

    <h3>Controle de Animais</h3>
    <ul>
        <li><a href="cadastrarAnimal.html">Cadastrar Animal</a></li>
        <li><a href="../Controllers/DC_todosAnimais.php?CPF=<?php echo $CPF ?>" >Consultar Animal</a></li>
    </ul>
    <h3>Controle de Reservas</h3>
    <ul>
        <li><a href="CadastrarReserva.html">Cadastrar Reserva</a></li>
        <li><a href="../Controllers/DC_consultarTodasReservas.php?CPF=<?php echo $CPF ?>" >Consultar Reserva</a></li>
    </ul>


</body>

</html>