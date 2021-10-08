<?php
	require_once('../Models/Dono.php');
	require_once('../Persistence/DonoDAO.php');
	require_once('../Persistence/Connection.php');

	class TestCadastrarDono extends PHPUnit\Framework\TestCase{
		
		public function testeCadastrarDono(){
			$donoConn = new connection();
			$donoConn->conectar();
			$conn = $donoConn->getConn();
			
			$dono = new Dono("55432789076", "Sophia Souza", "1986543345", "sophia.souza@mail.com", "16/05/2000", "Rua das Palmeiras, 95", "password_secret");
			$objDono = new DonoDAO();
			$objDono->cadastrar($obj, $conn);
			
			$cadastrarRes = $conn->query("SELECT CPF, nome, telefone, email, data_nascimento, endereco, senha FROM dono WHERE cpf='55432789076'");
			$cadastrar = $cadastrarRes->fetch_assoc();

			$this->assertEquals("55432789076", $cadastrar['CPF'], "CPF Incorreto");
			$this->assertEquals("Sophia Souza", $cadastrar['nome'], "Nome Incorreto!");
			$this->assertEquals("1986543345", $cadastrar['telefone'], "Telefone Incorreto!");
			$this->assertEquals("sophia.souza@mail.com", $cadastrar['email'], "Email Incorreto!");
			$this->assertEquals("16/05/2000", $cadastrar['data_nascimento'], "Data de Nascimento Incorreta!");
            $this->assertEquals("Rua das Palmeiras, 95", $cadastrar['endereco'], "Endereço Incorreto!");
            $this->assertEquals("password_secret", $cadastrar['senha'], "Senha Incorreta!");
		}
	}
?>