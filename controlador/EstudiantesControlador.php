<?php

include '../datos/EstudiantesDao.php';

class EstudiantesControlador
{

    public function getEstudiantes()
    {
        return EstudiantesDao::getEstudiantes();
    }

    public function crearEstudiantes($nombre, $id_estudiantes)
    {
        $obj_estudiantes = new Estudiantes();
        $obj_estudiantes->setNombre($nombre);
        if (!is_null($id_estudiantes)) {
            $obj_estudiantes->setId_estudiantes($id_estudiantes);
        }

        return EstudiantesDao::crearEstudiantes($obj_estudiantes);
    }

    public function getEstudiantesPorId($id_estudiantes)
    {
        return EstudiantesDao::getEstudiantesPorId($id_estudiantes);
    }

    public function eliminarEstudiantes($id_estudiantes)
    {
        return EstudiantesDao::eliminarEstudiantes($id_estudiantes);
    }

}

