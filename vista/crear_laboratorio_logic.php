<?php

include '../controlador/LaboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtCapacidad"]) && isset($_POST["txtEstado"]) && isset($_POST["txtId_tipo_laboratorio"]) && isset($_POST["txtId_campus"]) ) {

        $txtNombre      = validar_campo($_POST["txtNombre"]);
        $txtCapacidad     = validar_campo($_POST["txtCapacidad"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);
        $txtId_tipo_laboratorio    = validar_campo($_POST["txtId_tipo_laboratorio"]); 
        $txtId_campus      = validar_campo($_POST["txtId_campus"]);

        if (isset($_POST["id_laboratorio"])) {
            if (LaboratorioControlador::crearLaboratorio($txtNombre, $txtCapacidad, $txtEstado, $txtId_tipo_laboratorio, $txtId_campus, validar_campo($_POST["id_laboratorio"]))) {
                header("location:vlaboratorio.php");
            }
        } else {
            if (LaboratorioControlador::crearLaboratorio($txtNombre, $txtCapacidad, $txtEstado, $txtId_tipo_laboratorio, $txtId_campus, null)) {
                header("location:vlaboratorio.php");
            }
        }

    }
} else {
    header("location:crear_laboratorio_form.php?error=1");
}