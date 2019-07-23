<?php

include '../datos/CampusDao.php';

class CampusControlador
{

    public function getCampus()
    {
        return CampusDao::getCampus();
    }

    public function crearCampus($nombre,$direccion,$estado, $id_campus)
    {
        $obj_campus = new Campus();
        $obj_campus->setNombre($nombre);
        $obj_campus->setDireccion($direccion);
        $obj_campus->setEstado($estado);
        if (!is_null($id_campus)) {
            $obj_campus->setId_campus($id_campus);
        }

        return CampusDao::crearCampus($obj_campus);
    }

    public function getCampusPorId($id_campus)
    {
        return CampusDao::getCampusPorId($id_campus);
    }

    public function eliminarCampus($id_campus)
    {
        return CampusDao::eliminarCampus($id_campus);
    }

}
