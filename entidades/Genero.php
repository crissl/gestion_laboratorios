<?php

class Genero{
    private $id_genero;
    private $nombre;
    private $estado;

    public function getId_genero(){
		return $this->id_genero;
	}

	public function setId_genero($id_genero){
		$this->id_genero = $id_genero;
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