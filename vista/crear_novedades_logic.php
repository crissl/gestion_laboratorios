<?php

include '../controlador/NovedadesControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_novedades"])) {
            if (NovedadesControlador::crearNovedades($txtNombre, $txtEstado, validar_campo($_POST["id_novedades"]))) {
                header("location:vnovedades.php");
            }
        } else {
            if (NovedadesControlador::crearNovedades($txtNombre,  $txtEstado, null)) {
                header("location:vnovedades.php");
            }
        }

    }
} else {
    header("location:crear_novedades_form.php?error=1");
}