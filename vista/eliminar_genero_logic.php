<?php

include '../controlador/GeneroControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_genero"])) {

        $id_genero = validar_campo($_GET["id_genero"]);

        if (GeneroControlador::eliminarGenero($id_genero)) {
            header("location:vgenero.php");
        }

    }
} else {
    header("location:vgenero.php?error=1");
}
