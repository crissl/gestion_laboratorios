<?php

include '../datos/TlaboratoriosDao.php';

class TlaboratoriosControlador
{

    public function getTlaboratorios()
    {
        return TlaboratoriosDao::getTlaboratorios();
    }

    public function crearTlaboratorios($nombre, $estado, $id_tipo_laboratorio)
    {
        $obj_tlaboratorio = new Tipo_laboratorio();
        $obj_tlaboratorio->setNombre($nombre);
        $obj_tlaboratorio->setEstado($estado);
        if (!is_null($id_tipo_laboratorio)) {
            $obj_tlaboratorio->setId_tipo_laboratorio($id_tipo_laboratorio);
        }

        return TlaboratoriosDao::crearTlaboratorios($obj_tlaboratorio);
    }

    public function getTlaboratoriosPorId($id_tipo_laboratorio)
    {
        return TlaboratoriosDao::getTlaboratoriosPorId($id_tipo_laboratorio);
    }

    public function eliminarTlaboratorios($id_tipo_laboratorio)
    {
        return TlaboratoriosDao::eliminarTlaboratorios($id_tipo_laboratorio);
    }

}
