<?php

include '../controlador/Detalle_uso_laboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_detalle_uso_laboratorio"])) {

        $id_detalle_uso_laboratorio = validar_campo($_GET["id_detalle_uso_laboratorio"]);

        if (Detalle_uso_laboratorioControlador::eliminarDetalle_uso_laboratorio($id_detalle_uso_laboratorio)) {
            header("location:vdetalle_uso_laboratorio.php");
        }

    }
} else {
    header("location:vdetalle_uso_laboratorio.php?error=1");
}
