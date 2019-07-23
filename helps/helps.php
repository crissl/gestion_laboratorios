<?php

/**
 * Función que sirve para validar y limpiar  un campo
 *
 * @param     input         $campo         Tiene que ser campo de tipo POST
 * @return     string
 */
function validar_campo($campo)
{
    $campo = trim($campo);
    $campo = stripcslashes($campo);
    $campo = htmlspecialchars($campo);

    return $campo;
}

function getId_tipo_usuario($p)
{
    $id_tipo_usuario = "";
    switch ($p) {
        case 1:
        $id_tipo_usuario = "Administrador";
            break;

        case 2:
        $id_tipo_usuario = "Usuario";
            break;

        default:
        $id_tipo_usuario = "- No definido -";
            break;
    }

    return $id_tipo_usuario;
}
