<?php

include '../datos/Detalle_uso_laboratorioDao.php';

class Detalle_uso_laboratorioControlador
{

    public function getDetalle_uso_laboratorio()
    {
        return Detalle_uso_laboratorioDao::getDetalle_uso_laboratorio();
    }

    public function crearDetalle_uso_laboratorio($descripcion, $id_uso_laboratorio, $id_novedades, $id_detalle_uso_laboratorio)
    {
        $obj_detalle_uso_laboratorio = new Detalle_uso_laboratorio();
        $obj_detalle_uso_laboratorio->setDescripcion($descripcion);
        $obj_detalle_uso_laboratorio->setId_uso_laboratorio($id_uso_laboratorio);
        $obj_detalle_uso_laboratorio->setId_novedades($id_novedades);
        if (!is_null($id_detalle_uso_laboratorio)) {
            $obj_detalle_uso_laboratorio->setId_detalle_uso_laboratorio($id_detalle_uso_laboratorio);
        }

        return Detalle_uso_laboratorioDao::crearDetalle_uso_laboratorio($obj_detalle_uso_laboratorio);
    }

    public function getDetalle_uso_laboratorioPorId($id_detalle_uso_laboratorio)
    {
        return Detalle_uso_laboratorioDao::getDetalle_uso_laboratorioPorId($id_detalle_uso_laboratorio);
    }

    public function eliminarDetalle_uso_laboratorio($id_detalle_uso_laboratorio)
    {
        return Detalle_uso_laboratorioDao::eliminarDetalle_uso_laboratorio($id_detalle_uso_laboratorio);
    }

}
