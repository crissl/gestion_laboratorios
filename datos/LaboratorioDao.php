<?php

include 'Conexion.php';
include '../entidades/Laboratorio.php';

class LaboratorioDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un Laboratorio por su id
     *
     * @param      object         $laboratorio
     * @return     object
     */
    public static function getLaboratorioPorId($id_laboratorio)
    {
        $query = "SELECT * FROM laboratorio WHERE id_laboratorio = :id_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_laboratorio", $id_laboratorio);

        $resultado->execute();

        $filas = $resultado->fetch();

        $laboratorio = new Laboratorio();
        $laboratorio->setId_laboratorio($filas["id_laboratorio"]);
        $laboratorio->setNombre($filas["nombre"]);
        $laboratorio->setCapacidad($filas["capacidad"]);
        $laboratorio->setEstado($filas["estado"]);
        $laboratorio->setId_tipo_laboratorio($filas["capacidad"]);
        $laboratorio->setId_campus($filas["estado"]);
     

        return $laboratorio;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $laboratorio
     * @return     boolean
     */
    public static function eliminarLaboratorio($id_laboratorio)
    {
        $query = "DELETE FROM laboratorio WHERE id_laboratorio = :id_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_laboratorio", $id_laboratorio);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los laboratorio
     *
     * @return     object
     */
    public static function getLaboratorio()
    {
        $query = "SELECT * FROM laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    /**
     * Metodo que sirve para crear y editar laboratorio
     *
     * @param      object         $laboratorio
     * @return     boolean
     */

    public static function crearLaboratorio($laboratorio){
      
        if (is_null($laboratorio->getId_laboratorio())) {
            $query = "INSERT INTO laboratorio(nombre,capacidad,estado,id_tipo_laboratorio,id_campus) VALUES (:nombre,:capacidad,:estado,:id_tipo_laboratorio,:id_campus)";
        } else {
            $query = "UPDATE laboratorio SET nombre=:nombre,capacidad=:capacidad,estado=:estado,id_tipo_laboratorio=:id_tipo_laboratorio,id_campus=:id_campus WHERE id_laboratorio=:id_laboratorio";
        }
     
       
        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $nombre     = $laboratorio->getNombre();
        $capacidad  = $laboratorio->getCapacidad();
        $estado     = $laboratorio->getEstado();
        $id_tipo_laboratorio  = $laboratorio->getId_tipo_laboratorio();
        $id_campus     = $laboratorio->getId_campus();

        if (!is_null($laboratorio->getId_laboratorio())) {
            $id_laboratorio = $laboratorio->getId_laboratorio();
            $resultado->bindParam(":id_laboratorio", $id_laboratorio);
        } 
        
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam("capacidad", $capacidad);
        $resultado->bindParam(":estado", $estado);
        $resultado->bindParam("id_tipo_laboratorio", $id_tipo_laboratorio);
        $resultado->bindParam(":id_campus", $id_campus);
        
        if ($resultado->execute()) {
            return true;
           
        }

        return false;
    
}
 }



