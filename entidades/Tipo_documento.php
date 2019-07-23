<?php

class Tipo_documento{
    
    private $id_tipo_documento;
    private $nombre;
    private $estado;

    public function getId_tipo_documento(){
		return $this->id_tipo_documento;
	}

	public function setId_tipo_documento($id_tipo_documento){
		$this->id_tipo_documento = $id_tipo_documento;
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