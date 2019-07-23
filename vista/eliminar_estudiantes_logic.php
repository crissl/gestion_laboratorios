<?php

include '../controlador/EstudiantesControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_estudiantes"])) {

        $id_estudiantes = validar_campo($_GET["id_estudiantes"]);

        if (EstudiantesControlador::eliminarEstudiantes($id_estudiantes)) {
            header("location:vestudiantes.php");
        }

    }
} else {
    header("location:vestudiantes.php?error=1");
}
