<?php

class Professor extends Pessoa {

	private $professorID;

	//Construtor	
	public function Professor($nome, $cpf, $rg, $rua, $cidade, $estado, $telefone, $impressaoDigital, $professorID) {
		parent::Pessoa($nome, $cpf, $rg, $rua, $cidade, $estado, $telefone, $impressaoDigital);
		$this->professorID = $professorID;
	}
	
	//Métodos Gettters
	public function getProfessorID() {
		return $this->professorID;	
	}
	
	//Métodos Setters
	public function setProfessorID($professorID) {
		$this->professorID = $professorID;	
	}
	
}

?>