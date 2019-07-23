<?php

include '../controlador/Tipo_usuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEstado"])) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);

        if (isset($_POST["id_tipo_usuario"])) {
            if (Tipo_usuarioControlador::crearTipo_usuario($txtNombre, $txtEstado, validar_campo($_POST["id_tipo_usuario"]))) {
                header("location:vtipo_usuario.php");
            }
        } else {
            if (Tipo_usuarioControlador::crearTipo_usuario($txtNombre,  $txtEstado, null)) {
                header("location:vtipo_usuario.php");
            }
        }

    }
} else {
    header("location:crear_tipo_usuario_form.php?error=1");
}