<?php

class Laboratorio{
    
    private $id_laboratorio;
    private $nombre;
    private $capacidad;
    private $estado;
    private $id_tipo_laboratorio;
    private $id_campus;
    
    public function getId_laboratorio(){
		return $this->id_laboratorio;
	}

	public function setId_laboratorio($id_laboratorio){
		$this->id_laboratorio = $id_laboratorio;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCapacidad(){
		return $this->capacidad;
	}

	public function setCapacidad($capacidad){
		$this->capacidad = $capacidad;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getId_tipo_laboratorio(){
		return $this->id_tipo_laboratorio;
	}

	public function setId_tipo_laboratorio($id_tipo_laboratorio){
		$this->id_tipo_laboratorio = $id_tipo_laboratorio;
	}

	public function getId_campus(){
		return $this->id_campus;
	}

	public function setId_campus($id_campus){
		$this->id_campus = $id_campus;
	}
    }