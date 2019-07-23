<?php

include '../controlador/CarreraControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_carrera"])) {

        $id_carrera = validar_campo($_GET["id_carrera"]);

        if (CarreraControlador::eliminarCarrera($id_carrera)) {
            header("location:vcarrera.php");
        }

    }
} else {
    header("location:vcarrera.php?error=1");
}
