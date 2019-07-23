<?php

class Detalle_uso_laboratorio{
    private $id_detalle_uso_laboratorio;
    private $descripcion;
    private $id_uso_laboratorio;
    private $id_novedades;
    
    public function getId_detalle_uso_laboratorio(){
		return $this->id_detalle_uso_laboratorio;
	}

	public function setId_detalle_uso_laboratorio($id_detalle_uso_laboratorio){
		$this->id_detalle_uso_laboratorio = $id_detalle_uso_laboratorio;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getId_uso_laboratorio(){
		return $this->id_uso_laboratorio;
	}

	public function setId_uso_laboratorio($id_uso_laboratorio){
		$this->id_uso_laboratorio = $id_uso_laboratorio;
	}

	public function getId_novedades(){
		return $this->id_novedades;
	}

	public function setId_novedades($id_novedades){
		$this->id_novedades = $id_novedades;
	}
 }