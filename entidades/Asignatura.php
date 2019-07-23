<?php

class Asignatura{
    
    private $id_asignatura;
    private $nombre;
    private $estado;
    private $id_carrera;

    public function getId_asignatura(){
		return $this->id_asignatura;
	}

	public function setId_asignatura($id_asignatura){
		$this->id_asignatura = $id_asignatura;
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

	public function getId_carrera(){
		return $this->id_carrera;
	}

	public function setId_carrera($id_carrera){
		$this->id_carrera = $id_carrera;
    }
    
     }