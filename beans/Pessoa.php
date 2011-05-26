<?php

class Pessoa {

    private $nome;
    private $cpf;
    private $rg;
    private $rua;
    private $cidade;
    private $estado;
    private $telefone;
    private $impressaoDigital;

    //Construtor
    public function Pessoa($nome, $cpf, $rg, $rua, $cidade, $estado, $telefone, $impressaoDigital) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->rua = $rua;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->telefone = $telefone;
        $this->impressaoDigital = $impressaoDigital;
    }

    //metodos getters
    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getRua() {
        return $this->rua;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getImpressaoDigital() {
        return $this->impressaoDigital;
    }

    //metodos setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setRua($rua) {
        $this->rua = $rua;
    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setImpressaoDigital($impressaoDigital) {
        $this->impressaoDigital = $impressaoDigital;
    }

}

?>