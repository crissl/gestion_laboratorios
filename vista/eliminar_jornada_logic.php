<?php

include '../controlador/JornadaControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_jornada"])) {

        $id_jornada = validar_campo($_GET["id_jornada"]);

        if (JornadaControlador::eliminarJornada($id_jornada)) {
            header("location:vjornada.php");
        }

    }
} else {
    header("location:vjornada.php?error=1");
}
