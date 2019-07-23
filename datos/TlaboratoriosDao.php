<?php

include 'Conexion.php';
include '../entidades/Tipo_laboratorio.php';

class TlaboratoriosDao extends Conexion
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
     * Metodo que sirve para obtener o buscar un usuario por su id
     *
     * @param      object         $tlaboratorios
     * @return     object
     */
    public static function getTlaboratoriosPorId($id_tipo_laboratorio)
    {
        $query = "SELECT * FROM tipo_laboratorio WHERE id_tipo_laboratorio = :id_tipo_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_laboratorio", $id_tipo_laboratorio);

        $resultado->execute();

        $filas = $resultado->fetch();

        $tlaboratorios = new Tipo_laboratorio();
        $tlaboratorios->setId_tipo_laboratorio($filas["id_tipo_laboratorio"]);
        $tlaboratorios->setNombre($filas["nombre"]);
        $tlaboratorios->setEstado($filas["estado"]);
     

        return $tlaboratorios;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $campus
     * @return     boolean
     */
    public static function eliminarTlaboratorios($id_tipo_laboratorio)
    {
        $query = "DELETE FROM tipo_laboratorio WHERE id_tipo_laboratorio = :id_tipo_laboratorio";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_tipo_laboratorio", $id_tipo_laboratorio);

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
    public static function getTlaboratorios()
    {
        $query = "SELECT * FROM tipo_laboratorio";

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

    public static function crearTlaboratorios($tlaboratorios){
        
            if (is_null($tlaboratorios->getId_tipo_laboratorio())) {
                $query = "INSERT INTO tipo_laboratorio (nombre,estado) VALUES (:nombre,:estado)";
            } else {
                $query = "UPDATE tipo_laboratorio SET nombre=:nombre,estado=:estado WHERE id_tipo_laboratorio=:id_tipo_laboratorio";
            }
    
            self::getConexion();
    
            $resultado = self::$cnx->prepare($query);
    
            $nombre     = $tlaboratorios->getNombre();
            $estado        = $tlaboratorios->getEstado();
            
            if (!is_null($tlaboratorios->getId_tipo_laboratorio())) {
                $id_tipo_laboratorio = $tlaboratorios->getId_tipo_laboratorio();
                $resultado->bindParam(":id_tipo_laboratorio", $id_tipo_laboratorio);
            } else {
                echo "error";
            }
    
            $resultado->bindParam(":nombre", $nombre);
            $resultado->bindParam(":estado", $estado);
    
            if ($resultado->execute()) {
                return true;
            }
    
            return false;
        }
    
 }



