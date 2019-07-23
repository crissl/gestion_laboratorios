<?php

class Usuario
{

    private $id_usuario;	
    private $nombres; 
    private $apellidos;	
    private $nro_documento;	
    private $telefono;	
    private $nacionalidad;	
    private $estado;	
    private $usu;	
    private $contrasena;	
    private $id_tipo_documento;	
    private $id_genero;	
    private $id_tipo_usuario;
    
    public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function getNro_documento(){
		return $this->nro_documento;
	}

	public function setNro_documento($nro_documento){
		$this->nro_documento = $nro_documento;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getNacionalidad(){
		return $this->nacionalidad;
	}

	public function setNacionalidad($nacionalidad){
		$this->nacionalidad = $nacionalidad;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
	}

	public function getUsuario(){
		return $this->usu;
	}

	public function setUsuario($usu){
		$this->usu = $usu;
	}

	public function getContrasena(){
		return $this->contrasena;
	}

	public function setContrasena($contrasena){
		$this->contrasena = $contrasena;
	}

	public function getId_tipo_documento(){
		return $this->id_tipo_documento;
	}

	public function setId_tipo_documento($id_tipo_documento){
		$this->id_tipo_documento = $id_tipo_documento;
	}

	public function getId_genero(){
		return $this->id_genero;
	}

	public function setId_genero($id_genero){
		$this->id_genero = $id_genero;
	}

	public function getId_tipo_usuario(){
		return $this->id_tipo_usuario;
	}

	public function setId_tipo_usuario($id_tipo_usuario){
		$this->id_tipo_usuario = $id_tipo_usuario;
	}
}
