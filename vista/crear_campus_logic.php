<?php

include '../controlador/CampusControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtDireccion"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtDireccion     = validar_campo($_POST["txtDireccion"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_campus"])) {
            if (CampusControlador::crearCampus($txtNombre, $txtDireccion, $txtEstado, validar_campo($_POST["id_campus"]))) {
                header("location:vcampus.php");
            }
        } else {
            if (CampusControlador::crearCampus($txtNombre, $txtDireccion, $txtEstado, null)) {
                header("location:vcampus.php");
            }
        }

    }
} else {
    header("location:crear_campus_form.php?error=1");
}