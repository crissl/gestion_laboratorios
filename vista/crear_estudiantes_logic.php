<?php

include '../controlador/EstudiantesControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);


        if (isset($_POST["id_estudiantes"])) {
            if (EstudiantesControlador::crearEstudiantes($txtNombre, validar_campo($_POST["id_estudiantes"]))) {
                header("location:vestudiantes.php");
            }
        } else {
            if (EstudiantesControlador::crearEstudiantes($txtNombre, null)) {
                header("location:vestudiantes.php");
            }
        }

    }
} else {
    header("location:crear_estudiantes_form.php?error=1");
}