<?php

class FuncionarioDAO {
   
    function __construct() { }

    function SalvarFuncionario($funcionario, $connect) {
        $sql = "INSERT INTO Funcionario(CPF, nomeFunc, email, data_Nasc, senha, telefone) VALUES ('" .
                $funcionario->getCPF() . "','" .
                $funcionario->getnomeFunc() . "','" .
                $funcionario->getEmail() . "','" .
                $funcionario->getdata_Nasc() . "','" .
                $funcionario->getSenha() . "','" .
                $funcionario->getTelefone() . "'" . ")";
        
        if ($connect->query($sql)) {
            echo "<script> alert('Funcionário cadastrado!');document.location='../index.html'</script>";
        }else {
            echo "ERRO" . $connect->error;
        }       
    }
    function ConsultarTodosFuncionarios($connect) {
        $sql = "SELECT * FROM Funcionario ";
        $resultado = $connect->query($sql);
        return $resultado;
    }
    function DeletarFuncionario($cpf, $connect) {
     
        $sql = "DELETE FROM Funcionario WHERE CPF=".$cpf;
        
        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Funcionário removido!');document.location='../index.html'</script>";
        } else {
            echo "Erro na remoção: " . $connect->error;
        }

    }
    function ConsultarFuncionario($cpf, $connect) {
        $sql = "SELECT * FROM Funcionario WHERE CPF=".$cpf;
        $res = $connect->query($sql);
        return $res;
    }
    function AlterarFuncionario($funcionario, $connect) {
        $sql = " UPDATE Funcionario SET CPF='" . 
        $funcionario->getCPF() . "' ,nomeFunc='" . 
        $funcionario->getnomeFunc() . "',email='" .
        $funcionario->getEmail() . "',data_Nasc='" . 
        $funcionario->getdata_Nasc() . "',telefone='" . 
        $funcionario->getTelefone() ."' WHERE CPF=". 
        $funcionario->getCPF();
        $res = $connect->query($sql);
        
        return $res;
    }
    
    function Login ($connect, $CPF, $senha) {
        $sql = "SELECT * FROM Funcionario WHERE CPF=".$CPF;
        $res = $connect->query($sql);
        return $res;
    }
}

?>