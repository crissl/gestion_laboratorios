<?php

include '../datos/UsuarioDao.php';

class UsuarioControlador
{

    public static function login($usu, $contrasena)
    {
        $obj_usuario = new Usuario();
        $obj_usuario->setUsuario($usu);
        $obj_usuario->setContrasena($contrasena);

        return UsuarioDao::login($obj_usuario);
    }

    public function crearUsuario($nombres, $apellidos, $nro_documento, $telefono, $nacionalidad, $estado, $usu, $contrasena, $id_tipo_documento, $id_genero, $id_tipo_usuario, $id_usuario)
    {
    $obj_usuario = new Usuario();
    $obj_usuario->setNombres($nombres);
    $obj_usuario->setApellidos($apellidos);
    $obj_usuario->setNro_documento($nro_documento);
    $obj_usuario->setTelefono($telefono);
    $obj_usuario->setNacionalidad($nacionalidad);
    $obj_usuario->setEstado($estado);
    $obj_usuario->setUsuario($usu);
    $obj_usuario->setContrasena($contrasena);
    $obj_usuario->setId_tipo_documento($id_tipo_documento);
    $obj_usuario->setId_genero($id_genero);
    $obj_usuario->setId_tipo_usuario($id_tipo_usuario);
    if (!is_null($id_usuario)) {
        $obj_usuario->setId_usuario($id_usuario);
    }

    return UsuarioDao::crearUsuario($obj_usuario);
}


    public function getUsuarios()
{
    return UsuarioDao::getUsuarios();
}
public function getUsuario($usu, $contrasena)
{
    $obj_usuario = new Usuario();
    $obj_usuario->setUsuario($usu);
    $obj_usuario->setContrasena($contrasena);

    return UsuarioDao::getUsuario($obj_usuario);
}

public function getUsuarioPorId($id_usuario)
{
    return UsuarioDao::getUsuarioPorId($id_usuario);
}

public function eliminarUsuario($id_usuario)
{
    return UsuarioDao::eliminarUsuario($id_usuario);
}


}