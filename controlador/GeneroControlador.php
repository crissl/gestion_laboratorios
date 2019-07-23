<?php

include '../datos/GeneroDao.php';

class GeneroControlador
{

    public function getGenero()
    {
        return GeneroDao::getGenero();
    }

    public function crearGenero($nombre, $estado, $id_genero)
    {
        $obj_genero = new Genero();
        $obj_genero->setNombre($nombre);
        $obj_genero->setEstado($estado);
        if (!is_null($id_genero)) {
            $obj_genero->setId_genero($id_genero);
        }

        return GeneroDao::crearGenero($obj_genero);
    }

    public function getGeneroPorId($id_genero)
    {
        return GeneroDao::getGeneroPorId($id_genero);
    }

    public function eliminarGenero($id_genero)
    {
        return GeneroDao::eliminarGenero($id_genero);
    }

}
