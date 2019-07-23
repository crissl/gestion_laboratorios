<?php

include '../datos/Tipo_usuarioDao.php';

class Tipo_usuarioControlador
{

    public function getTipo_usuario()
    {
        return Tipo_usuarioDao::getTipo_usuario();
    }

    public function crearTipo_usuario($nombre, $estado, $id_tipo_usuario)
    {
        $obj_tipo_usuario = new Tipo_usuario();
        $obj_tipo_usuario->setNombre($nombre);
        $obj_tipo_usuario->setEstado($estado);
        if (!is_null($id_tipo_usuario)) {
            $obj_tipo_usuario->setId_tipo_usuario($id_tipo_usuario);
        }

        return Tipo_usuarioDao::crearTipo_usuario($obj_tipo_usuario);
    }

    public function getTipo_usuarioPorId($id_tipo_usuario)
    {
        return Tipo_usuarioDao::getTipo_usuarioPorId($id_tipo_usuario);
    }

    public function eliminarTipo_usuario($id_tipo_usuario)
    {
        return Tipo_usuarioDao::eliminarTipo_usuario($id_tipo_usuario);
    }

}
