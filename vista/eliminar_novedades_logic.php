<?php

include '../controlador/NovedadesControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_novedades"])) {

        $id_novedades = validar_campo($_GET["id_novedades"]);

        if (NovedadesControlador::eliminarNovedades($id_novedades)) {
            header("location:vnovedades.php");
        }

    }
} else {
    header("location:vnovedades.php?error=1");
}
