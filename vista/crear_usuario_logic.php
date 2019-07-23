<?php

include '../controlador/UsuarioControlador.php';
include '../helps/helps.php';

session_start();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombres"]) && isset($_POST["txtApellidos"]) && isset($_POST["txtNro_documento"]) && isset($_POST["txtTelefono"]) && isset($_POST["txtNacionalidad"]) && isset($_POST["txtEstado"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtContrasena"]) && isset($_POST["txtId_tipo_documento"]) && isset($_POST["txtId_genero"]) && isset($_POST["txtId_tipo_usuario"])) {
        
       $txtNombres     = validar_campo($_POST["txtNombres"]);
        $txtApellidos     = validar_campo($_POST["txtApellidos"]);
        $txtNro_documento    = validar_campo($_POST["txtNro_documento"]);
        $txtTelefono   = validar_campo($_POST["txtTelefono"]);
        $txtNacionalidad     = validar_campo($_POST["txtNacionalidad"]);
        $txtEstado      = validar_campo($_POST["txtEstado"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
        $txtContrasena   = validar_campo($_POST["txtContrasena"]);
        $txtId_tipo_documento      = validar_campo($_POST["txtId_tipo_documento"]);
        $txtId_genero   = validar_campo($_POST["txtId_genero"]);
        $txtId_tipo_usuario   = validar_campo($_POST["txtId_tipo_usuario"]);
    
   

        if (isset($_POST["id_usuario"])) {
            if (UsuarioControlador::crearUsuario($txtNombres, $txtApellidos, $txtNro_documento, $txtTelefono, $txtNacionalidad ,$txtEstado, $txtUsuario, $txtContrasena, $txtId_tipo_documento, $txtId_genero, $txtId_tipo_usuario, validar_campo($_POST["id_usuario"]))) {
             
                
            }
        } else {
            if (UsuarioControlador::crearUsuario($txtNombres, $txtApellidos, $txtNro_documento, $txtTelefono, $txtNacionalidad ,$txtEstado, $txtUsuario, $txtContrasena, $txtId_tipo_documento, $txtId_genero, $txtId_tipo_usuario, null)) {
                header("location:vusuario.php");
                echo "usuario guarda";
                
            }
        }

    }
} else {
    header("location:crear_usuario_form.php?error=1");
}


