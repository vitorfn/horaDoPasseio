<?php

class AcomodacaoDAO {
   
    function __construct() { }

    function SalvarAcomodacao($acomodacao, $connect) {
        $sql = "INSERT INTO Acomodacao(capacidade, valor) VALUES ('" .
                $acomodacao->getCapacidade() . "','" .
                $acomodacao->getValor(). "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Acomodação cadastrada!');document.location='../index.html'</script>";
        }else {
            echo "ERRO " . $connect->error;
        }       
    }
    function ConsultarTodasAcomodacoes($connect) {
        $sql = "SELECT * FROM Acomodacao ";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarAcomodacao($idQuarto, $connect) {
     
        $sql = "DELETE FROM Acomodacao WHERE idQuarto=".$idQuarto;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Acomodação removida!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarAcomodacao($idQuarto, $connect) {
        $sql = "SELECT * FROM Acomodacao WHERE idQuarto=".$idQuarto;
        $res = $connect->query($sql);
        return $res;
    }

    function AlterarAcomodacao($acomodacao, $connect, $idQuarto) {
        $sql = " UPDATE Acomodacao SET capacidade='" . 
        $acomodacao->getCapacidade() . "',valor='" .
        $acomodacao->getValor() ."' WHERE idQuarto=". 
        $idQuarto;
        $res = $connect->query($sql);
        
        
        return $res;
    }
    
}

?>