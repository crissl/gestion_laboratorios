<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_usuario"])) {

        $id_usuario = validar_campo($_GET["id_usuario"]);

        if (UsuarioControlador::eliminarUsuario($id_usuario)) {
            header("location:vusuario.php");
        }

    }
} else {
    header("location:vusuario.php?error=1");
}
