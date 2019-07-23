<?php

include 'Conexion.php';
include '../entidades/Carrera.php';

class CarreraDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Carrera por su id
     *
     * @param      object         $carrera
     * @return     object
     */
    public static function getCarreraPorId($id_carrera)
    {
        $query = "SELECT * FROM carrera WHERE id_carrera = :id_carrera";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_carrera", $id_carrera);

        $resultado->execute();

        $filas = $resultado->fetch();

        $carrera = new Carrera();
        $carrera->setId_carrera($filas["id_carrera"]);
        $carrera->setNombre($filas["nombre"]);
        $carrera->setEstado($filas["estado"]);
     

        return $carrera;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $carrera
     * @return     boolean
     */
    public static function eliminarCarrera($id_carrera)
    {
        $query = "DELETE FROM carrera WHERE id_carrera = :id_carrera";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_carrera", $id_carrera);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los carrera
     *
     * @return     object
     */
    public static function getCarrera()
    {
        $query = "SELECT * FROM carrera";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar carrera
     *
     * @param      object         $carrera
     * @return     boolean
     */

    public static function crearCarrera($carrera){
      
        if (is_null($carrera->getId_carrera())) {
            $query = "INSERT INTO carrera(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE carrera SET nombre=:nombre,estado=:estado WHERE id_carrera=:id_carrera";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $carrera->getNombre();
        $estado     = $carrera->getEstado();

        if (!is_null($carrera->getId_carrera())) {
            $id_carrera = $carrera->getId_carrera();
            $resultado->bindParam(":id_carrera", $id_carrera);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



