<?php

include 'Conexion.php';
include '../entidades/Tipo_usuario.php';

class Tipo_usuarioDao extends Conexion
{
    protected static $cnx;

    private static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    /**
     * Metodo que sirve para obtener o buscar un Tipo_usuario por su id
     *
     * @param      object         $tipo_usuario
     * @return     object
     */
    public static function getTipo_usuarioPorId($id_tipo_usuario)
    {
        $query = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_usuario", $id_tipo_usuario);

        $resultado->execute();

        $filas = $resultado->fetch();

        $tipo_usuario = new Tipo_usuario();
        $tipo_usuario->setId_tipo_usuario($filas["id_tipo_usuario"]);
        $tipo_usuario->setNombre($filas["nombre"]);
        $tipo_usuario->setEstado($filas["estado"]);
     

        return $tipo_usuario;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $tipo_usuario
     * @return     boolean
     */
    public static function eliminarTipo_usuario($id_tipo_usuario)
    {
        $query = "DELETE FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_usuario", $id_tipo_usuario);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los tipo_usuario
     *
     * @return     object
     */
    public static function getTipo_usuario()
    {
        $query = "SELECT * FROM tipo_usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar tipo_usuario
     *
     * @param      object         $tipo_usuario
     * @return     boolean
     */

    public static function crearTipo_usuario($tipo_usuario){
      
        if (is_null($tipo_usuario->getId_tipo_usuario())) {
            $query = "INSERT INTO tipo_usuario(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE tipo_usuario SET nombre=:nombre,estado=:estado WHERE id_tipo_usuario=:id_tipo_usuario";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $tipo_usuario->getNombre();
        $estado     = $tipo_usuario->getEstado();

        if (!is_null($tipo_usuario->getId_tipo_usuario())) {
            $id_tipo_usuario = $tipo_usuario->getId_tipo_usuario();
            $resultado->bindParam(":id_tipo_usuario", $id_tipo_usuario);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



