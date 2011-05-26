<?php

class Materia {

    private $materiaID;
    private $nome;
    private $cargaHoraria;
    private $professorID;
    private $turmaID;
    private $alunos;
   
    public function Materia($materiaID, $nome, $cargaHoraria, $professorID, $turmaID) {
        $this->materiaID = $materiaID;
        $this->nome = $nome;
        $this->cargaHoraria = $cargaHoraria;
        $this->professorID = $professorID;
        $this->turmaID = $turmaID;
    }

    //Metodos Getters e Setters
    public function getMateriaID() {
        return $this->materiaID;
    }

    public function setMateriaID($materiaID) {
        $this->materiaID = $materiaID;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    public function getProfessorID() {
        return $this->professorID;
    }

    public function setProfessorID($professorID) {
        $this->professorID = $professorID;
    }

    public function getTurmaID() {
        return $this->turmaID;
    }

    public function setTurmaID($turmaID) {
        $this->turmaID = $turmaID;
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function setAlunos($alunos) {
        $this->alunos = $alunos;
    }

}

?>