<?php

include '../datos/NovedadesDao.php';

class NovedadesControlador
{

    public function getNovedades()
    {
        return NovedadesDao::getNovedades();
    }

    public function crearNovedades($nombre, $estado, $id_novedades)
    {
        $obj_novedades = new Novedades();
        $obj_novedades->setNombre($nombre);
        $obj_novedades->setEstado($estado);
        if (!is_null($id_novedades)) {
            $obj_novedades->setId_novedades($id_novedades);
        }

        return NovedadesDao::crearNovedades($obj_novedades);
    }

    public function getNovedadesPorId($id_novedades)
    {
        return NovedadesDao::getNovedadesPorId($id_novedades);
    }

    public function eliminarNovedades($id_novedades)
    {
        return NovedadesDao::eliminarNovedades($id_novedades);
    }

}
