<?php

class Tipo_laboratorio{
    
    private $id_tipo_laboratorio;
    private $nombre;
    private $estado;

    public function getId_tipo_laboratorio(){
		return $this->id_tipo_laboratorio;
	}

	public function setId_tipo_laboratorio($id_tipo_laboratorio){
		$this->id_tipo_laboratorio = $id_tipo_laboratorio;
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