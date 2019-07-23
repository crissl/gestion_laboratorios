<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"])) {

        $txtUsuario  = validar_campo($_POST["txtUsuario"]);
        $txtPassword = validar_campo($_POST["txtContrasena"]);

        $resultado = array("estado" => "true");

        if (UsuarioControlador::login($txtUsuario, $txtPassword)) {
            $usuario             = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
            $_SESSION["usuario"] = array(
                "id_usuario"         => $usuario->getId_usuario(),
                "nombres"     => $usuario->getNombres(),
                "apellidos"    => $usuario->getApellidos(),
                "nro_documento"      => $usuario->getNro_documento(),
                "nacionalidad" => $usuario->getNacionalidad(),
            );
            return print(json_encode($resultado));
        }

    }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));
