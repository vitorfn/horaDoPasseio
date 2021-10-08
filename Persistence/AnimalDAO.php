<?php

class AnimalDAO {
   
    function __construct() { }

    function SalvarAnimal($animal, $connect) {
        $sql = "INSERT INTO Animal(nomeAnimal, anoNascimento, observacoes, especie, raca, CPF) VALUES ('" .
                $animal->getNomeAnimal() . "','" .
                $animal->getAnoNascimento() . "','" .
                $animal->getObservacoes() . "','" .
                $animal->getEspecie() . "','" .
                $animal->getRaca() . "','" .
                $animal->getCPF(). "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Animal cadastrado!');document.location='../index.html'</script>";
        }else {
            echo "ERRO " . $connect->error;
        }       
    }
    function ConsultarTodosAnimais($connect) {
        $sql = "SELECT * FROM Animal ";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarAnimal($idAnimal, $connect) {
     
        $sql = "DELETE FROM Animal WHERE idAnimal=".$idAnimal;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Animal removido!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarAnimal($idAnimal, $connect) {
        $sql = "SELECT * FROM Animal INNER JOIN Dono ON Animal.CPF = Dono.CPF WHERE idAnimal=".$idAnimal;
        $res = $connect->query($sql);
        return $res;
    }

    function AlterarAnimal($animal, $connect, $idAnimal) {
        $sql = " UPDATE Animal SET nomeAnimal='" . 
        $animal->getnomeAnimal() . "',anoNascimento='" .
        $animal->getAnoNascimento() . "',observacoes='" . 
        $animal->getObservacoes() . "',especie='" . 
        $animal->getEspecie() . "',raca='" . 
        $animal->getRaca() . "',CPF='" . 
        $animal->getCPF() ."' WHERE idAnimal=". 
        $idAnimal;
        $res = $connect->query($sql);
        
        
        return $res;
    }

    function ConsultarTodosAnimaisCPF($CPF, $connect) {
        $sql = "SELECT * FROM Animal INNER JOIN Dono ON Animal.CPF = Dono.CPF WHERE Animal.CPF=".$CPF;
        $resultado = $connect->query($sql);
        return $resultado;
    }

    function ConsultarTodosAnimaisNome($connect) {
        $sql = "SELECT * FROM Animal INNER JOIN Dono ON Animal.CPF = Dono.CPF";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    
}

?>