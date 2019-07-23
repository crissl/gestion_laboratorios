<?php

include '../datos/JornadaDao.php';

class JornadaControlador
{

    public function getJornada()
    {
        return JornadaDao::getJornada();
    }

    public function crearJornada($nombre, $estado, $id_jornada)
    {
        $obj_jornada = new Jornada();
        $obj_jornada->setNombre($nombre);
        $obj_jornada->setEstado($estado);
        if (!is_null($id_jornada)) {
            $obj_jornada->setId_jornada($id_jornada);
        }

        return JornadaDao::crearJornada($obj_jornada);
    }

    public function getJornadaPorId($id_jornada)
    {
        return JornadaDao::getJornadaPorId($id_jornada);
    }

    public function eliminarJornada($id_jornada)
    {
        return JornadaDao::eliminarJornada($id_jornada);
    }

}
