<?php

include 'Conexion.php';
include '../entidades/Campus.php';

class CampusDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Campus por su id
     *
     * @param      object         $campus
     * @return     object
     */
    public static function getCampusPorId($id_campus)
    {
        $query = "SELECT * FROM campus WHERE id_campus = :id_campus";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_campus", $id_campus);

        $resultado->execute();

        $filas = $resultado->fetch();

        $campus = new Campus();
        $campus->setId_campus($filas["id_campus"]);
        $campus->setNombre($filas["nombre"]);
        $campus->setDireccion($filas["direccion"]);
        $campus->setEstado($filas["estado"]);
     

        return $campus;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $campus
     * @return     boolean
     */
    public static function eliminarCampus($id_campus)
    {
        $query = "DELETE FROM campus WHERE id_campus = :id_campus";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_campus", $id_campus);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los campus
     *
     * @return     object
     */
    public static function getCampus()
    {
        $query = "SELECT * FROM campus";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar campus
     *
     * @param      object         $campus
     * @return     boolean
     */

    public static function crearCampus($campus){
      
        if (is_null($campus->getId_campus())) {
            $query = "INSERT INTO campus(nombre,direccion,estado) VALUES (:nombre,:direccion,:estado)";
        } else {
            $query = "UPDATE campus SET nombre=:nombre,direccion=:direccion,estado=:estado WHERE id_campus=:id_campus";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $campus->getNombre();
        $direccion  = $campus->getDireccion();
        $estado     = $campus->getEstado();

        if (!is_null($campus->getId_campus())) {
            $id_campus = $campus->getId_campus();
            $resultado->bindParam(":id_campus", $id_campus);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam("direccion", $direccion);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



