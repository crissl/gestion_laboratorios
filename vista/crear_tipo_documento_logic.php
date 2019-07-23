<?php

include '../controlador/Tipo_documentoControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_tipo_documento"])) {
            if (Tipo_documentoControlador::crearTipo_documento($txtNombre, $txtEstado, validar_campo($_POST["id_tipo_documento"]))) {
                header("location:vtipo_documento.php");
            }
        } else {
            if (Tipo_documentoControlador::crearTipo_documento($txtNombre,  $txtEstado, null)) {
                header("location:vtipo_documento.php");
            }
        }

    }
} else {
    header("location:crear_tipo_documento_form.php?error=1");
}