<?php

include 'Conexion.php';
include '../entidades/Detalle_uso_laboratorio.php';

class Detalle_uso_laboratorioDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Detalle_uso_laboratorio por su id
     *
     * @param      object         $detalle_uso_laboratorio
     * @return     object
     */
    public static function getDetalle_uso_laboratorioPorId($id_detalle_uso_laboratorio)
    {
        $query = "SELECT * FROM detalle_uso_laboratorio WHERE id_detalle_uso_laboratorio = :id_detalle_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_detalle_uso_laboratorio", $id_detalle_uso_laboratorio);

        $resultado->execute();

        $filas = $resultado->fetch();

        $detalle_uso_laboratorio = new Detalle_uso_laboratorio();
        $detalle_uso_laboratorio->setId_detalle_uso_laboratorio($filas["id_detalle_uso_laboratorio"]);
        $detalle_uso_laboratorio->setDescripcion($filas["descripcion"]);
        $detalle_uso_laboratorio->setId_uso_laboratorio($filas["id_uso_laboratorio"]);
        $detalle_uso_laboratorio->setId_novedades($filas["id_novedades"]);
     

        return $detalle_uso_laboratorio;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $detalle_uso_laboratorio
     * @return     boolean
     */
    public static function eliminarDetalle_uso_laboratorio($id_detalle_uso_laboratorio)
    {
        $query = "DELETE FROM detalle_uso_laboratorio WHERE id_detalle_uso_laboratorio = :id_detalle_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_detalle_uso_laboratorio", $id_detalle_uso_laboratorio);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los detalle_uso_laboratorio
     *
     * @return     object
     */
    public static function getDetalle_uso_laboratorio()
    {
        $query = "SELECT * FROM detalle_uso_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar detalle_uso_laboratorio
     *
     * @param      object         $detalle_uso_laboratorio
     * @return     boolean
     */

    public static function crearDetalle_uso_laboratorio($detalle_uso_laboratorio){
      
        if (is_null($detalle_uso_laboratorio->getId_detalle_uso_laboratorio())) {
            $query = "INSERT INTO detalle_uso_laboratorio(descripcion,id_uso_laboratorio,id_novedades) VALUES (:descripcion,:id_uso_laboratorio,:id_novedades)";
        } else {
            $query = "UPDATE detalle_uso_laboratorio SET descripcion=:descripcion,id_uso_laboratorio=:id_uso_laboratorio,id_novedades=:id_novedades WHERE id_detalle_uso_laboratorio=:id_detalle_uso_laboratorio";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $descripcion    = $detalle_uso_laboratorio->getDescripcion();
        $id_uso_laboratorio     = $detalle_uso_laboratorio->getId_uso_laboratorio(); 
        $id_novedades    = $detalle_uso_laboratorio->getId_novedades();

        if (!is_null($detalle_uso_laboratorio->getId_detalle_uso_laboratorio())) {
            $id_detalle_uso_laboratorio = $detalle_uso_laboratorio->getId_detalle_uso_laboratorio();
            $resultado->bindParam(":id_detalle_uso_laboratorio", $id_detalle_uso_laboratorio);
        } 
        
        $resultado->bindParam(":descripcion", $descripcion);
        $resultado->bindParam(":id_uso_laboratorio", $id_uso_laboratorio);
        $resultado->bindParam(":id_novedades", $id_novedades);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



