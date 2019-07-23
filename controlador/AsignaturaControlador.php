<?php

include '../datos/AsignaturaDao.php';

class AsignaturaControlador
{

    public function getAsignatura()
    {
        return AsignaturaDao::getAsignatura();
    }

    public function crearAsignatura($nombre, $estado,$id_carrera, $id_asignatura)
    {
        $obj_asignatura = new Asignatura();
        $obj_asignatura->setNombre($nombre);
        $obj_asignatura->setEstado($estado);
        $obj_asignatura->setId_carrera($id_carrera);
        

        if (!is_null($id_asignatura)) {
            $obj_asignatura->setId_asignatura($id_asignatura);
        }

        return AsignaturaDao::crearAsignatura($obj_asignatura);
    }

    public function getAsignaturaPorId($id_asignatura)
    {
        return AsignaturaDao::getAsignaturaPorId($id_asignatura);
    }

    public function eliminarAsignatura($id_asignatura)
    {
        return AsignaturaDao::eliminarAsignatura($id_asignatura);
    }

}
