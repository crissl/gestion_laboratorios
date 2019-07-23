<?php

class Jornada{
    private $id_jornada;
    private $nombre;
    private $estado;

    public function getId_jornada(){
		return $this->id_jornada;
	}

	public function setId_jornada($id_jornada){
		$this->id_jornada = $id_jornada;
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