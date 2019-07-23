<?php

include '../controlador/Tipo_usuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_tipo_usuario"])) {

        $id_tipo_usuario = validar_campo($_GET["id_tipo_usuario"]);

        if (Tipo_usuarioControlador::eliminarTipo_usuario($id_tipo_usuario)) {
            header("location:vtipo_usuario.php");
        }

    }
} else {
    header("location:vtipo_usuario.php?error=1");
}
