<?php

class Novedades{
    private $id_novedades;
    private $nombre;
    private $estado;

    public function getId_novedades(){
		return $this->id_novedades;
	}

	public function setId_novedades($id_novedades){
		$this->id_novedades = $id_novedades;
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