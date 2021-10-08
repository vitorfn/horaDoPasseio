<?php

class DonoDAO {
   
    function __construct() { }

    function SalvarDono($dono, $connect) {
        $sql = "INSERT INTO Dono(CPF, nome, telefone, email, data_nascimento, endereco, senha) VALUES ('" .
                $dono->getCPF() . "','" .
                $dono->getnome() . "','" .
                $dono->getTelefone() . "','" .
                $dono->getEmail() . "','" .
                $dono->getdata_nascimento() . "','" .
                $dono->getEndereco() . "','" .
                $dono->getSenha() . "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Dono cadastrado!');document.location='../index.html'</script>";
        }else {
            echo "ERRO " . $connect->error;
        }       
    }
    function ConsultarTodosDonos($connect) {
        $sql = "SELECT * FROM Dono ";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarDono($cpf, $connect) {
     
        $sql = "DELETE FROM Dono WHERE CPF=".$cpf;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Dono removido!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarDono($cpf, $connect) {
        $sql = "SELECT * FROM Dono WHERE CPF=".$cpf;
        $res = $connect->query($sql);
        return $res;
    }
    function AlterarDono($dono, $connect) {
        $sql = " UPDATE Dono SET CPF='" . 
        $dono->getCPF() . "' ,nome='" . 
        $dono->getnome() . "',email='" .
        $dono->getEmail() . "',data_nascimento='" . 
        $dono->getdata_nascimento() . "',telefone='" . 
        $dono->getTelefone() ."' WHERE CPF=". 
        $dono->getCPF();
        $res = $connect->query($sql);
        
        return $res;
    }

    function Login ($connect, $CPF, $senha) {
        $sql = "SELECT * FROM Dono WHERE CPF=".$CPF;
        $res = $connect->query($sql);
        return $res;
    }
    
}

?>