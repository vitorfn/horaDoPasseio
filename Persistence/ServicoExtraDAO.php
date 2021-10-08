<?php

class ServicoExtraDAO {
   
    function __construct() { }

    function SalvarServicoExtra($servicoExtra, $connect) {
        $sql = "INSERT INTO ServicoExtra(descricao, valor, dataServico, idReserva) VALUES ('" .
                $servicoExtra->getDescricao() . "','" .
                $servicoExtra->getValor() . "','" .
                $servicoExtra->getDataServico() . "','" .
                $servicoExtra->getIdReserva(). "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Serviço extra cadastrado!');document.location='../index.html'</script>";
        }else {
            echo "ERRO " . $connect->error;
        }       
    }
    function ConsultarTodosServicosExtras($connect, $idReserva) {
        $sql = "SELECT * FROM ServicoExtra WHERE idReserva=".$idReserva;
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarServicoExtra($idServico, $connect) {
     
        $sql = "DELETE FROM ServicoExtra WHERE idServico=".$idServico;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Serviço extra removido!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarServicoExtra($idServico, $connect) {
        $sql = "SELECT * FROM ServicoExtra WHERE idServico=".$idServico;
        $res = $connect->query($sql);
        return $res;
    }

    function AlterarServicoExtra($servicoExtra, $connect, $idServico) {
        $sql = " UPDATE ServicoExtra SET descricao='" . 
        $servicoExtra->getDescricao() . "',valor='" .
        $servicoExtra->getValor() . "',idReserva='" .
        $servicoExtra->getIdReserva() . "',dataServico='" .
        $servicoExtra->getDataServico() ."' WHERE idServico=". 
        $idServico;
        $res = $connect->query($sql);
        
        
        return $res;
    }
    
}

?>