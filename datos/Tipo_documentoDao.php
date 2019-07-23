<?php

include 'Conexion.php';
include '../entidades/Tipo_documento.php';

class Tipo_documentoDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Tipo_documento por su id
     *
     * @param      object         $tipo_documento
     * @return     object
     */
    public static function getTipo_documentoPorId($id_tipo_documento)
    {
        $query = "SELECT * FROM tipo_documento WHERE id_tipo_documento = :id_tipo_documento";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_documento", $id_tipo_documento);

        $resultado->execute();

        $filas = $resultado->fetch();

        $tipo_documento = new Tipo_documento();
        $tipo_documento->setId_tipo_documento($filas["id_tipo_documento"]);
        $tipo_documento->setNombre($filas["nombre"]);
        $tipo_documento->setEstado($filas["estado"]);
     

        return $tipo_documento;
    }

    /**
     * Metodo que sirve para eliminar un documento
     *
     * @param      object         $tipo_documento
     * @return     boolean
     */
    public static function eliminarTipo_documento($id_tipo_documento)
    {
        $query = "DELETE FROM tipo_documento WHERE id_tipo_documento = :id_tipo_documento";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_documento", $id_tipo_documento);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los tipo_documento
     *
     * @return     object
     */
    public static function getTipo_documento()
    {
        $query = "SELECT * FROM tipo_documento";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar tipo_documento
     *
     * @param      object         $tipo_documento
     * @return     boolean
     */

    public static function crearTipo_documento($tipo_documento){
      
        if (is_null($tipo_documento->getId_tipo_documento())) {
            $query = "INSERT INTO tipo_documento(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE tipo_documento SET nombre=:nombre,estado=:estado WHERE id_tipo_documento=:id_tipo_documento";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $tipo_documento->getNombre();
        $estado     = $tipo_documento->getEstado();

        if (!is_null($tipo_documento->getId_tipo_documento())) {
            $id_tipo_documento = $tipo_documento->getId_tipo_documento();
            $resultado->bindParam(":id_tipo_documento", $id_tipo_documento);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



