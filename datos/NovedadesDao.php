<?php

include 'Conexion.php';
include '../entidades/Novedades.php';

class NovedadesDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Novedades por su id
     *
     * @param      object         $novedades
     * @return     object
     */
    public static function getNovedadesPorId($id_novedades)
    {
        $query = "SELECT * FROM novedades WHERE id_novedades = :id_novedades";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_novedades", $id_novedades);

        $resultado->execute();

        $filas = $resultado->fetch();

        $novedades = new Novedades();
        $novedades->setId_novedades($filas["id_novedades"]);
        $novedades->setNombre($filas["nombre"]);
        $novedades->setEstado($filas["estado"]);
     

        return $novedades;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $novedades
     * @return     boolean
     */
    public static function eliminarNovedades($id_novedades)
    {
        $query = "DELETE FROM novedades WHERE id_novedades = :id_novedades";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_novedades", $id_novedades);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los novedades
     *
     * @return     object
     */
    public static function getNovedades()
    {
        $query = "SELECT * FROM novedades";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar novedades
     *
     * @param      object         $novedades
     * @return     boolean
     */

    public static function crearNovedades($novedades){
      
        if (is_null($novedades->getId_novedades())) {
            $query = "INSERT INTO novedades(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE novedades SET nombre=:nombre,estado=:estado WHERE id_novedades=:id_novedades";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $novedades->getNombre();
        $estado     = $novedades->getEstado();

        if (!is_null($novedades->getId_novedades())) {
            $id_novedades = $novedades->getId_novedades();
            $resultado->bindParam(":id_novedades", $id_novedades);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



