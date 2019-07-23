<?php

class Tipo_usuario{
    
    private $id_tipo_usuario;
    private $nombre;
    private $estado;

    public function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	public function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario = $id_tipo_usuario;
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