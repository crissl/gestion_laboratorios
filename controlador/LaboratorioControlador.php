<?php

include '../datos/LaboratorioDao.php';

class LaboratorioControlador
{

    public function getLaboratorio()
    {
        return LaboratorioDao::getLaboratorio();
    }

    public function crearLaboratorio($nombre,$capacidad,$estado,$id_tipo_laboratorio,$id_campus,$id_laboratorio)
    {
        $obj_laboratorio = new Laboratorio();
        $obj_laboratorio->setNombre($nombre);
        $obj_laboratorio->setCapacidad($capacidad);
        $obj_laboratorio->setEstado($estado);
        $obj_laboratorio->setId_tipo_laboratorio($id_tipo_laboratorio);
        $obj_laboratorio->setId_campus($id_campus);
        if (!is_null($id_laboratorio)) {
            $obj_laboratorio->setId_laboratorio($id_laboratorio);
        }

        return LaboratorioDao::crearLaboratorio($obj_laboratorio);
    }

    public function getLaboratorioPorId($id_laboratorio)
    {
        return LaboratorioDao::getLaboratorioPorId($id_laboratorio);
    }

    public function eliminarLaboratorio($id_laboratorio)
    {
        return LaboratorioDao::eliminarLaboratorio($id_laboratorio);
    }

}
