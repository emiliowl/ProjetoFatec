<?php

class Matricula {

    private $matriculaID;
    private $materiaID;
    private $alunoID;
    private $turmaID;
    private $status;

    public function Matricula($matriculaID, $materiaID, $alunoID, $turmaID, $status) {
        $this->matriculaID = $matriculaID;
        $this->materiaID = $materiaID;
        $this->alunoID = $alunoID;
        $this->turmaID = $turmaID;
        $this->status = $status;
    }

    //Metodos Getters e Setters
    public function getMatriculaID() {
        return $this->matriculaID;
    }

    public function setMatriculaID($matriculaID) {
        $this->matriculaID = $matriculaID;
    }

    public function getMateriaID() {
        return $this->materiaID;
    }

    public function setMateriaID($materiaID) {
        $this->materiaID = $materiaID;
    }

    public function getAlunoID() {
        return $this->alunoID;
    }

    public function setAlunoID($alunoID) {
        $this->alunoID = $alunoID;
    }

    public function getTurmaID() {
        return $this->turmaID;
    }

    public function setTurmaID($turmaID) {
        $this->turmaID = $turmaID;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

}

?>