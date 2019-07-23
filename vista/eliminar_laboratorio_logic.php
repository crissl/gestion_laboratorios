<?php

include '../controlador/LaboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_laboratorio"])) {

        $id_laboratorio = validar_campo($_GET["id_laboratorio"]);

        if (LaboratorioControlador::eliminarLaboratorio($id_laboratorio)) {
            header("location:vlaboratorio.php");
        }

    }
} else {
    header("location:vlaboratorio.php?error=1");
}
