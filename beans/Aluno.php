<?php

class Aluno extends Pessoa {
	private $ra;
    private $alunoID;
	
	//Construtor	
	public function Aluno($nome, $cpf, $rg, $rua, $cidade, $estado, $telefone, $impressaoDigital, $ra, $alunoID) {
		parent::Pessoa($nome, $cpf, $rg, $rua, $cidade, $estado, $telefone, $impressaoDigital);
		$this->ra = $ra;
        $this->alunoID = $alunoID;
	}
	
	//Métodos Getters
	public function getRa() {
		return $this->ra;	
	}
    public function getAlunoID() {
        return $this->alunoID;
    }
	
	//Métodos Setters
	public function setRa($ra) {
		$this->ra = $ra;
	}
    public function setAlunoID($alunoID) {
        $this->alunoID = $alunoID;
    }
        
}

?>