<?php

include '../controlador/Estudiantes_uso_laboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtId_estudiantes"]) && isset($_POST["txtId_uso_laboratorio"])) {

        $txtId_estudiantes     = validar_campo($_POST["txtId_estudiantes"]);
        $txtId_uso_laboratorio     = validar_campo($_POST["txtId_uso_laboratorio"]);

        if (isset($_POST["id_estudiantes_uso_laboratorio"])) {
            if (Estudiantes_uso_laboratorioControlador::crearEstudiantes_uso_laboratorio($txtId_estudiantes, $txtId_uso_laboratorio, validar_campo($_POST["id_estudiantes_uso_laboratorio"]))) {
                header("location:veulaboratorio.php");
            }
        } else {
            if (Estudiantes_uso_laboratorioControlador::crearEstudiantes_uso_laboratorio($txtId_estudiantes,  $txtId_uso_laboratorio, null)) {
                header("location:veulaboratorio.php");
            }
        }

    }
} else {
    header("location:crear_estudiantes_uso_laboratorio_form.php?error=1");
}