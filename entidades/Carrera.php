<?php

class Carrera{
    private $id_carrera;
    private $nombre;
    private $estado;

    public function getId_carrera(){
		return $this->id_carrera;
	}

	public function setId_carrera($id_carrera){
		$this->id_carrera = $id_carrera;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}
}