<?php

include '../controlador/TlaboratoriosControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_tipo_laboratorio"])) {

        $id_tipo_laboratorio = validar_campo($_GET["id_tipo_laboratorio"]);

        if (TlaboratoriosControlador::eliminarTlaboratorios($id_tipo_laboratorio)) {
            header("location:vtipo_laboratorio.php");
        }

    }
} else {
    header("location:vtipo_laboratorio.php?error=1");
}
