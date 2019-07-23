<?php

include '../controlador/GeneroControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_genero"])) {
            if (GeneroControlador::crearGenero($txtNombre, $txtEstado, validar_campo($_POST["id_genero"]))) {
                header("location:vgenero.php");
            }
        } else {
            if (GeneroControlador::crearGenero($txtNombre,  $txtEstado, null)) {
                header("location:vgenero.php");
            }
        }

    }
} else {
    header("location:crear_genero_form.php?error=1");
}