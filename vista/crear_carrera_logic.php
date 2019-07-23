<?php

include '../controlador/CarreraControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_carrera"])) {
            if (CarreraControlador::crearCarrera($txtNombre, $txtEstado, validar_campo($_POST["id_carrera"]))) {
                header("location:vcarrera.php");
            }
        } else {
            if (CarreraControlador::crearCarrera($txtNombre,  $txtEstado, null)) {
                header("location:vcarrera.php");
            }
        }

    }
} else {
    header("location:crear_carrera_form.php?error=1");
}