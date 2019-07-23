<?php

include 'Conexion.php';
include '../entidades/Jornada.php';

class JornadaDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Jornada por su id
     *
     * @param      object         $jornada
     * @return     object
     */
    public static function getJornadaPorId($id_jornada)
    {
        $query = "SELECT * FROM jornada WHERE id_jornada = :id_jornada";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_jornada", $id_jornada);

        $resultado->execute();

        $filas = $resultado->fetch();

        $jornada = new Jornada();
        $jornada->setId_jornada($filas["id_jornada"]);
        $jornada->setNombre($filas["nombre"]);
        $jornada->setEstado($filas["estado"]);
     

        return $jornada;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $jornada
     * @return     boolean
     */
    public static function eliminarJornada($id_jornada)
    {
        $query = "DELETE FROM jornada WHERE id_jornada = :id_jornada";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_jornada", $id_jornada);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los jornada
     *
     * @return     object
     */
    public static function getJornada()
    {
        $query = "SELECT * FROM jornada";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar jornada
     *
     * @param      object         $jornada
     * @return     boolean
     */

    public static function crearJornada($jornada){
      
        if (is_null($jornada->getId_jornada())) {
            $query = "INSERT INTO jornada(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE jornada SET nombre=:nombre,estado=:estado WHERE id_jornada=:id_jornada";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $jornada->getNombre();
        $estado     = $jornada->getEstado();

        if (!is_null($jornada->getId_jornada())) {
            $id_jornada = $jornada->getId_jornada();
            $resultado->bindParam(":id_jornada", $id_jornada);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



