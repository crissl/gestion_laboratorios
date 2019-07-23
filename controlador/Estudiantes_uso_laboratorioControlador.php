<?php

include '../datos/Estudiantes_uso_laboratorioDao.php';

class Estudiantes_uso_laboratorioControlador
{

    public function getEstudiantes_uso_laboratorio()
    {
        return Estudiantes_uso_laboratorioDao::getEstudiantes_uso_laboratorio();
    }

    public function crearEstudiantes_uso_laboratorio($id_estudiantes, $id_uso_laboratorio, $id_estudiantes_uso_laboratorio)
    {
        $obj_estudiantes_uso_laboratorio = new Estudiantes_uso_laboratorio();
        $obj_estudiantes_uso_laboratorio->setId_estudiantes($id_estudiantes);
        $obj_estudiantes_uso_laboratorio->setId_uso_laboratorio($id_uso_laboratorio);
        if (!is_null($id_estudiantes_uso_laboratorio)) {
            $obj_estudiantes_uso_laboratorio->setId_estudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio);
        }

        return Estudiantes_uso_laboratorioDao::crearEstudiantes_uso_laboratorio($obj_estudiantes_uso_laboratorio);
    }

    public function getEstudiantes_uso_laboratorioPorId($id_estudiantes_uso_laboratorio)
    {
        return Estudiantes_uso_laboratorioDao::getEstudiantes_uso_laboratorioPorId($id_estudiantes_uso_laboratorio);
    }

    public function eliminarEstudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio)
    {
        return Estudiantes_uso_laboratorioDao::eliminarEstudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio);
    }

}
