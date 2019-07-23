<?php

include '../controlador/CampusControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_campus"])) {

        $id_campus = validar_campo($_GET["id_campus"]);

        if (CampusControlador::eliminarCampus($id_campus)) {
            header("location:vcampus.php");
        }

    }
} else {
    header("location:vcampus.php?error=1");
}
