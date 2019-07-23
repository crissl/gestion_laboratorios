<?php

include 'Conexion.php';
include '../entidades/Asignatura.php';

class AsignaturaDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Asignatura por su id
     *
     * @param      object         $asignatura
     * @return     object
     */
    public static function getAsignaturaPorId($id_asignatura)
    {
        $query = "SELECT * FROM asignatura WHERE id_asignatura = :id_asignatura";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_asignatura", $id_asignatura);

        $resultado->execute();

        $filas = $resultado->fetch();

        $asignatura = new Asignatura();
        $asignatura->setId_asignatura($filas["id_asignatura"]);
        $asignatura->setNombre($filas["nombre"]);
        $asignatura->setEstado($filas["estado"]);
        $asignatura->setId_carrera($filas["id_carrera"]);
     

        return $asignatura;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $asignatura
     * @return     boolean
     */
    public static function eliminarAsignatura($id_asignatura)
    {
        $query = "DELETE FROM asignatura WHERE id_asignatura = :id_asignatura";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_asignatura", $id_asignatura);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los asignatura
     *
     * @return     object
     */
    public static function getAsignatura()
    {
        $query = "SELECT * FROM asignatura";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar asignatura
     *
     * @param      object         $asignatura
     * @return     boolean
     */

    public static function crearAsignatura($asignatura){
      
        if (is_null($asignatura->getId_asignatura())) {
            $query = "INSERT INTO asignatura(nombre,estado,id_carrera) VALUES (:nombre,:estado,:id_carrera)";
        } else {
            $query = "UPDATE asignatura SET nombre=:nombre,estado=:estado,id_carrera=:id_carrera WHERE id_asignatura=:id_asignatura";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $asignatura->getNombre();
        $estado     = $asignatura->getEstado();
        $id_carrera    = $asignatura->getId_carrera();

        if (!is_null($asignatura->getId_asignatura())) {
            $id_asignatura = $asignatura->getId_asignatura();
            $resultado->bindParam(":id_asignatura", $id_asignatura);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        $resultado->bindParam(":id_carrera", $id_carrera);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



