<?php

include 'Conexion.php';
include '../entidades/Estudiantes.php';

class EstudiantesDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Estudiantes por su id
     *
     * @param      object         $estudiantes
     * @return     object
     */
    public static function getEstudiantesPorId($id_estudiantes)
    {
        $query = "SELECT * FROM estudiantes WHERE id_estudiantes = :id_estudiantes";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_estudiantes", $id_estudiantes);

        $resultado->execute();

        $filas = $resultado->fetch();

        $estudiantes = new Estudiantes();
        $estudiantes->setId_estudiantes($filas["id_estudiantes"]);
        $estudiantes->setNombre($filas["nombre"]);
     

        return $estudiantes;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $estudiantes
     * @return     boolean
     */
    public static function eliminarEstudiantes($id_estudiantes)
    {
        $query = "DELETE FROM estudiantes WHERE id_estudiantes = :id_estudiantes";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_estudiantes", $id_estudiantes);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los estudiantes
     *
     * @return     object
     */
    public static function getEstudiantes()
    {
        $query = "SELECT * FROM estudiantes";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar estudiantes
     *
     * @param      object         $estudiantes
     * @return     boolean
     */

    public static function crearEstudiantes($estudiantes){
      
        if (is_null($estudiantes->getId_estudiantes())) {
            $query = "INSERT INTO estudiantes(nombre) VALUES (:nombre)";
        } else {
            $query = "UPDATE estudiantes SET nombre=:nombre WHERE id_estudiantes=:id_estudiantes";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $estudiantes->getNombre();

        if (!is_null($estudiantes->getId_estudiantes())) {
            $id_estudiantes = $estudiantes->getId_estudiantes();
            $resultado->bindParam(":id_estudiantes", $id_estudiantes);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



