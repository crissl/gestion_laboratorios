<?php

include '../controlador/AsignaturaControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"])  && isset($_POST["txtEstado"]) && isset($_POST["txtId_carrera"]) ) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);
        $txtId_carrera      = validar_campo($_POST["txtId_carrera"]);

        if (isset($_POST["id_asignatura"])) {
            if (AsignaturaControlador::crearAsignatura($txtNombre, $txtEstado, $txtId_carrera, validar_campo($_POST["id_asignatura"]))) {
                header("location:vasignatura.php");
            }
        } else {
            if (AsignaturaControlador::crearAsignatura($txtNombre, $txtEstado, $txtId_carrera, null)) {
                header("location:vasignatura.php");
            }
        }

    }
} else {
    header("location:crear_asignatura_form.php?error=1");
}