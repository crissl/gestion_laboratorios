<?php

include '../controlador/Estudiantes_uso_laboratorioControlador.php';
include '../helps/helps.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_estudiantes_uso_laboratorio"])) {

        $id_estudiantes_uso_laboratorio = validar_campo($_GET["id_estudiantes_uso_laboratorio"]);

        if (Estudiantes_uso_laboratorioControlador::eliminarEstudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio)) {
            header("location:vestudiantes_uso_laboratorio.php");
        }

    }
} else {
    header("location:vestudiantes_uso_laboratorio.php?error=1");
}
