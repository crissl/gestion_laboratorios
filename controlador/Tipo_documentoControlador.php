<?php

include '../datos/Tipo_documentoDao.php';

class Tipo_documentoControlador
{

    public function getTipo_documento()
    {
        return Tipo_documentoDao::getTipo_documento();
    }

    public function crearTipo_documento($nombre, $estado, $id_tipo_documento)
    {
        $obj_tipo_documento = new Tipo_documento();
        $obj_tipo_documento->setNombre($nombre);
        $obj_tipo_documento->setEstado($estado);
        if (!is_null($id_tipo_documento)) {
            $obj_tipo_documento->setId_tipo_documento($id_tipo_documento);
        }

        return Tipo_documentoDao::crearTipo_documento($obj_tipo_documento);
    }

    public function getTipo_documentoPorId($id_tipo_documento)
    {
        return Tipo_documentoDao::getTipo_documentoPorId($id_tipo_documento);
    }

    public function eliminarTipo_documento($id_tipo_documento)
    {
        return Tipo_documentoDao::eliminarTipo_documento($id_tipo_documento);
    }

}
