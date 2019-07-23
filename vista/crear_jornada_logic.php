<?php

include '../controlador/JornadaControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_jornada"])) {
            if (JornadaControlador::crearJornada($txtNombre, $txtEstado, validar_campo($_POST["id_jornada"]))) {
                header("location:vjornada.php");
            }
        } else {
            if (JornadaControlador::crearJornada($txtNombre,  $txtEstado, null)) {
                header("location:vjornada.php");
            }
        }

    }
} else {
    header("location:crear_jornada_form.php?error=1");
}