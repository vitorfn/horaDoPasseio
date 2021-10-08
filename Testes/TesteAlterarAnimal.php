<?php

require_once('../Models/Animal.php');
require_once('../Persistence/AnimalDAO.php');
require_once('../Persistence/Connection.php');

	class TesteAlterarAnimal extends \PHPUnit\Framework\TestCase {
		
		public function testInserirAnimal(){
			$animalConn = new connection();
			$animalConn->conectar();
			$connection = $animalConn->getConn();
			
			$animal = new animalDAO();
			$animal->alterar("11243", "Filózinha", "2020", "precisa consumir ração diet", "Cachorro", "Vira Lata", $conn);
			
			$alterarRes = $conn->query("SELECT idAnimal, nomeAnimal, anoNascimento, observacoes, especie, raca FROM animal WHERE idAnimal='11243'");
			$altera= $alterarRes->fetch_assoc();

			$this->assertEquals("11243", $altera['idAnimal'], "ID Incorreto!");
			$this->assertEquals("Filózinha", $altera['nomeAnimal'], "Nome Incorreto");
			$this->assertEquals("2020", $altera['anoNascimento'], "Ano de Nascimento Incorreto!");
			$this->assertEquals("precisa consumir ração diet", $altera['observacoes'], "Observações Incorretas");
			$this->assertEquals("Cachorro", $altera['especie'], "Espécie Incorreta");
			$this->assertEquals("Vira Lata", $altera['raca'], "Raca Incorreta");
		}
	}
?>