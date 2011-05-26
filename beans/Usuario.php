<?php

class Usuario {
    private $usuarioID;
	private $login;
    private $cpf;
    private $senha;

	//Construtor
	public function Usuario($login, $cpf,$senha, $usuarioID) {
		$this->login = $login;
		$this->cpf = $cpf;
        $this->senha = $senha;
        $this->usuarioID = $usuarioID;
	}

	//Métodos Getters
    public function getLogin() {
        return $this->login;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getUsuarioID() {
        return $this->usuarioID;
    }

	//Métodos Setters
    public function setLogin($login) {
        $this->login = $login;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

}

?>
