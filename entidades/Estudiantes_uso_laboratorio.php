<?php

class Estudiantes_uso_laboratorio{
    private $id_estudiantes_uso_laboratorio;
    private $id_estudiantes;
    private $id_uso_laboratorio;

    public function getId_estudiantes_uso_laboratorio(){
		return $this->id_estudiantes_uso_laboratorio;
	}

	public function setId_estudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio){
		$this->id_estudiantes_uso_laboratorio = $id_estudiantes_uso_laboratorio;
	}

	public function getId_estudiantes(){
		return $this->id_estudiantes;
	}

	public function setId_estudiantes($id_estudiantes){
		$this->id_estudiantes = $id_estudiantes;
	}

	public function getId_uso_laboratorio(){
		return $this->id_uso_laboratorio;
	}

	public function setId_uso_laboratorio($id_uso_laboratorio){
		$this->id_uso_laboratorio = $id_uso_laboratorio;
	}
 }


