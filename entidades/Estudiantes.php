<?php

class Estudiantes{
    private $id_estudiantes;
    private $nombre;

    public function getId_estudiantes(){
		return $this->id_estudiantes;
	}

	public function setId_estudiantes($id_estudiantes){
		$this->id_estudiantes = $id_estudiantes;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
}