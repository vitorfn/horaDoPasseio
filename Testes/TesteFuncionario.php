<?php

	require_once('../Models/Funcionario.php');
	
	class TesteFuncionario extends PHPUnit\Framework\TestCase{
		
		public function testConstrutor(){
			$funcionario = new Funcionario("12347659865", "Joana Catarina", "joana.catarina@mail.com", "13/06/1995", "password_123" , "1955029675");
			$this->assertEquals("12347659865", $funcionario->getCPF(), "CPF Incorreto!");
			$this->assertEquals("Joana Catarina", $funcionario->getNomeFunc(), "Nome Incorreto");
			$this->assertEquals("joana.catarina@mail.com", $funcionario>getEmail(), "Email Incorreto!");
			$this->assertEquals("13/06/1995", $funcionario->getDataNasc(), "Data de Nascimento Incorreto!");
			$this->assertEquals("password_123", $funcionario->getSenha(), "Senha Incorreta!");
			$this->assertEquals("1955029675", $funcionario->getTelefone(), "Telefone Incorreto!");
		}
	}
?>