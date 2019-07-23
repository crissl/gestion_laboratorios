<?php

include '../controlador/Tipo_documentoControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_tipo_documento"])) {

        $id_tipo_documento = validar_campo($_GET["id_tipo_documento"]);

        if (Tipo_documentoControlador::eliminarTipo_documento($id_tipo_documento)) {
            header("location:vtipo_documento.php");
        }

    }
} else {
    header("location:vtipo_documento.php?error=1");
}
