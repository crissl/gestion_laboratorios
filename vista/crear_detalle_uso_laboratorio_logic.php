<?php

include '../controlador/Detalle_uso_laboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtDescripcion"]) && isset($_POST["txtId_uso_laboratorio"]) && isset($_POST["txtId_novedades"]) ) {

        $txtDescripcion    = validar_campo($_POST["txtDescripcion"]);
        $txtId_uso_laboratorio      = validar_campo($_POST["txtId_uso_laboratorio"]);
        $txtId_novedades     = validar_campo($_POST["txtId_novedades"]);

        if (isset($_POST["id_detalle_uso_laboratorio"])) {
            if (Detalle_uso_laboratorioControlador::crearDetalle_uso_laboratorio($txtDescripcion, $txtId_uso_laboratorio, $txtId_novedades, validar_campo($_POST["id_detalle_uso_laboratorio"]))) {
                header("location:vdulaboratorio.php");
            }
        } else {
            if (Detalle_uso_laboratorioControlador::crearDetalle_uso_laboratorio($txtDescripcion, $txtId_uso_laboratorio, $txtId_novedades, null)) {
                header("location:vdulaboratorio.php");
            }
        }

    }
} else {
    header("location:crear_detalle_uso_laboratorio_form.php?error=1");
}