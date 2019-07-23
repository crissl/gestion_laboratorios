<?php

include 'Conexion.php';
include '../entidades/Estudiantes_uso_laboratorio.php';

class Estudiantes_uso_laboratorioDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Estudiantes_uso_laboratorio por su id
     *
     * @param      object         $estudiantes_uso_laboratorio
     * @return     object
     */
    public static function getEstudiantes_uso_laboratorioPorId($id_estudiantes_uso_laboratorio)
    {
        $query = "SELECT * FROM estudiantes_uso_laboratorio WHERE id_estudiantes_uso_laboratorio = :id_estudiantes_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_estudiantes_uso_laboratorio", $id_estudiantes_uso_laboratorio);

        $resultado->execute();

        $filas = $resultado->fetch();

        $estudiantes_uso_laboratorio = new Estudiantes_uso_laboratorio();
        $estudiantes_uso_laboratorio->setId_estudiantes_uso_laboratorio($filas["id_estudiantes_uso_laboratorio"]);
        $estudiantes_uso_laboratorio->setId_estudiantes($filas["id_estudiantes"]);
        $estudiantes_uso_laboratorio->setId_uso_laboratorio($filas["id_uso_laboratorio"]);
     

        return $estudiantes_uso_laboratorio;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $estudiantes_uso_laboratorio
     * @return     boolean
     */
    public static function eliminarEstudiantes_uso_laboratorio($id_estudiantes_uso_laboratorio)
    {
        $query = "DELETE FROM estudiantes_uso_laboratorio WHERE id_estudiantes_uso_laboratorio = :id_estudiantes_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_estudiantes_uso_laboratorio", $id_estudiantes_uso_laboratorio);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los estudiantes_uso_laboratorio
     *
     * @return     object
     */
    public static function getEstudiantes_uso_laboratorio()
    {
        $query = "SELECT * FROM estudiantes_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar estudiantes_uso_laboratorio
     *
     * @param      object         $estudiantes_uso_laboratorio
     * @return     boolean
     */

    public static function crearEstudiantes_uso_laboratorio($estudiantes_uso_laboratorio){
      
        if (is_null($estudiantes_uso_laboratorio->getId_estudiantes_uso_laboratorio())) {
            $query = "INSERT INTO estudiantes_uso_laboratorio(id_estudiantes,id_uso_laboratorio) VALUES (:id_estudiantes,:id_uso_laboratorio)";
        } else {
            $query = "UPDATE estudiantes_uso_laboratorio SET id_estudiantes=:id_estudiantes,id_uso_laboratorio=:id_uso_laboratorio WHERE id_estudiantes_uso_laboratorio=:id_estudiantes_uso_laboratorio";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $id_estudiantes     = $estudiantes_uso_laboratorio->getId_estudiantes();
        $id_uso_laboratorio     = $estudiantes_uso_laboratorio->getId_uso_laboratorio();

        if (!is_null($estudiantes_uso_laboratorio->getId_estudiantes_uso_laboratorio())) {
            $id_estudiantes_uso_laboratorio = $estudiantes_uso_laboratorio->getId_estudiantes_uso_laboratorio();
            $resultado->bindParam(":id_estudiantes_uso_laboratorio", $id_estudiantes_uso_laboratorio);
        } 
        
        $resultado->bindParam(":id_estudiantes", $id_estudiantes);
        $resultado->bindParam(":id_uso_laboratorio", $id_uso_laboratorio);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



