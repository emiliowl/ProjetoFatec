<?php

class Aula {

	private $aulaID;
	private $materiaID;
	private $horaInicio;
	private $horaFim;
    private $data;
	private $alunos;
	
    //Construtor
    public function Aula($aulaID, $materiaID, $horaInicio, $horaFim, $data) {
		$this->aulaID = $aulaID;
        $this->materiaID = $materiaID;
        $this->horaInicio = $horaInicio;
        $this->horaFim = $horaFim;
        $this->data = $data;
    }

	//Métodos Getters e Setters
    public function getAulaID() {
        return $this->aulaID;
    }

    public function setAulaID($aulaID) {
        $this->aulaID = $aulaID;
    }

    public function getMateriaID() {
        return $this->materiaID;
    }

    public function setMateriaID($materiaID) {
        $this->materiaID = $materiaID;
    }

    public function getHoraInicio() {
        return $this->horaInicio;
    }

    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    public function getHoraFim() {
        return $this->horaFim;
    }

    public function setHoraFim($horaFim) {
        $this->horaFim = $horaFim;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getAlunos() {
        return $this->alunos;
    }

    public function setAlunos($alunos) {
        $this->alunos = $alunos;
    }

}

?>