<?php

include '../controlador/AsignaturaControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_asignatura"])) {

        $id_asignatura = validar_campo($_GET["id_asignatura"]);

        if (AsignaturaControlador::eliminarAsignatura($id_asignatura)) {
            header("location:vasignatura.php");
        }

    }
} else {
    header("location:vasignatura.php?error=1");
}
