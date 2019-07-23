<?php

include 'Conexion.php';
include '../entidades/Genero.php';

class GeneroDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Genero por su id
     *
     * @param      object         $genero
     * @return     object
     */
    public static function getGeneroPorId($id_genero)
    {
        $query = "SELECT * FROM genero WHERE id_genero = :id_genero";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_genero", $id_genero);

        $resultado->execute();

        $filas = $resultado->fetch();

        $genero = new Genero();
        $genero->setId_genero($filas["id_genero"]);
        $genero->setNombre($filas["nombre"]);
        $genero->setEstado($filas["estado"]);
     

        return $genero;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $genero
     * @return     boolean
     */
    public static function eliminarGenero($id_genero)
    {
        $query = "DELETE FROM genero WHERE id_genero = :id_genero";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_genero", $id_genero);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los genero
     *
     * @return     object
     */
    public static function getGenero()
    {
        $query = "SELECT * FROM genero";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar genero
     *
     * @param      object         $genero
     * @return     boolean
     */
    
    public static function crearGenero($genero){
      
        if (is_null($genero->getId_genero())) {
            $query = "INSERT INTO genero(nombre,estado) VALUES (:nombre,:estado)";
        } else {
            $query = "UPDATE genero SET nombre=:nombre,estado=:estado WHERE id_genero=:id_genero";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $genero->getNombre();
        $estado     = $genero->getEstado();

        if (!is_null($genero->getId_genero())) {
            $id_genero = $genero->getId_genero();
            $resultado->bindParam(":id_genero", $id_genero);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":estado", $estado);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



