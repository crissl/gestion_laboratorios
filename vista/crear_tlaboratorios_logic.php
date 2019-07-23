<?php

include '../controlador/TlaboratoriosControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_tipo_laboratorio"])) {
            if (TlaboratoriosControlador::crearTlaboratorios($txtNombre, $txtEstado, validar_campo($_POST["id_tipo_laboratorio"]))) {
                header("location:vtipo_laboratorio.php");
            }
        } else {
            if (TlaboratoriosControlador::crearTlaboratorios($txtNombre, $txtEstado, null)) {
                header("location:vtipo_laboratorio.php");
            }
        }

    }
} else {
    header("location:crear_tlaboratorios_form.php?error=1");
}