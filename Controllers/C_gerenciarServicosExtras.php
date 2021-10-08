<?php

$idReserva =  $_GET['idReserva'];

?>

<html>
<h3>Controle de Serviços Extras</h3>
    <ul>
        <li><a href="../Views/CadastrarServicoExtra.php?idReserva=<?php echo $idReserva ?>">Cadastrar Serviço Extra</a></li>
        <li><a href="C_consultarTodosServicosExtras.php?idReserva=<?php echo $idReserva ?>">Consultar Serviços Extras</a></li>
        <li><a href="../Views/DeletarServicoExtra.html">Buscar e excluir</a></li>
        <li><a href="../Views/AlterarServicoExtra.html">Buscar e Alterar</a></li>
    </ul>    

</html>
