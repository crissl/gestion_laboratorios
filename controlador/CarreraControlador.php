<?php

include '../datos/CarreraDao.php';

class CarreraControlador
{

    public function getCarrera()
    {
        return CarreraDao::getCarrera();
    }

    public function crearCarrera($nombre, $estado, $id_carrera)
    {
        $obj_carrera = new Carrera();
        $obj_carrera->setNombre($nombre);
        $obj_carrera->setEstado($estado);
        if (!is_null($id_carrera)) {
            $obj_carrera->setId_carrera($id_carrera);
        }

        return CarreraDao::crearCarrera($obj_carrera);
    }

    public function getCarreraPorId($id_carrera)
    {
        return CarreraDao::getCarreraPorId($id_carrera);
    }

    public function eliminarCarrera($id_carrera)
    {
        return CarreraDao::eliminarCarrera($id_carrera);
    }

}
