<?php

class ReservaDAO {
   
    function __construct() { }

    function SalvarReserva($reserva, $connect) {
        $sql = "INSERT INTO Reserva(dataEntrada, dataSaida, CPF, idQuarto, idAnimal) VALUES ('" .
                $reserva->getDataEntrada() . "','" .
                $reserva->getDataSaida() . "','" .
                $reserva->getCPF() . "','" .
                $reserva->getidQuarto() . "','" .
                $reserva->getIdAnimal(). "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Reserva efetuada!');document.location='../index.html'</script>";
        }else {
            echo "ERRO " . $connect->error;
        }       
    }
    function ConsultarTodasReservas($connect) {
        $sql = "SELECT * FROM Reserva
        INNER JOIN Dono ON Reserva.CPF = Dono.CPF
        INNER JOIN Animal ON Reserva.idAnimal = Animal.idAnimal";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarReserva($idReserva, $connect) {
     
        $sql = "DELETE FROM Reserva WHERE idReserva=".$idReserva;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Reserva removida!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarReserva($idReserva, $connect) {
        $sql = "SELECT * FROM Reserva WHERE idReserva=".$idReserva;
        $res = $connect->query($sql);
        return $res;
    }

    function AlterarReserva($reserva, $connect, $idReserva) {
        $sql = " UPDATE Reserva SET dataEntrada='" . 
        $reserva->getDataEntrada() . "',dataSaida='" .
        $reserva->getDataSaida() . "',idQuarto='" .
        $reserva->getIdQuarto() . "',idAnimal='" .
        $reserva->getIdAnimal() ."' WHERE idReserva=". 
        $idReserva;
        $res = $connect->query($sql);
        
        
        return $res;
    }

    function ConsultarQuartosAptos($connect, $dataEntrada, $dataSaida) {
       $sql = "SELECT * FROM Acomodacao WHERE NOT EXISTS (SELECT * FROM Reserva, Acomodacao WHERE (Reserva.dataEntrada BETWEEN $dataEntrada and $dataSaida) OR (Reserva.dataSaida BETWEEN $dataEntrada and $dataSaida));";
       //$sql = "SELECT * FROM Acomodacao";  
       $resultado = $connect->query($sql);
        return $resultado;
    }

    function ConsultarTodasReservasCPF($connect, $CPF) {
        $sql = "SELECT * FROM Reserva WHERE CPF=".$CPF;
        $resultado = $connect->query($sql);
        return $resultado;
    }
    
}

?>