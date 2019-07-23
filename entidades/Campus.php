<?php

class Campus{
    
    private $id_campus;
    private $nombre;
    private $direccion;
    private $estado;

    public function getId_campus(){
		return $this->id_campus;
	}

	public function setId_campus($id_campus){
		$this->id_campus = $id_campus;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

}