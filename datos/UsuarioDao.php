<?php

include 'Conexion.php';
include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
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

    public static function getUsuario($usuario)
    {
        $query = "SELECT id_usuario,nombres,apellidos,nro_documento,telefono,nacionalidad,estado,usuario,contrasena,id_tipo_documento,id_genero,id_tipo_usuario FROM usuario WHERE usuario = :usuario AND contrasena = :contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usu  = $usuario->getUsuario();
        $pass = $usuario->getContrasena();

        $resultado->bindParam(":usuario", $usu);
        $resultado->bindParam(":contrasena", $pass);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId_usuario($filas["id_usuario"]);
        $usuario->setNombres($filas["nombres"]);
        $usuario->setApellidos($filas["apellidos"]);
        $usuario->setNro_documento($filas["nro_documento"]);
        $usuario->setTelefono($filas["telefono"]);
        $usuario->setNacionalidad($filas["nacionalidad"]);
        $usuario->setEstado($filas["estado"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setContrasena($filas["contrasena"]);
        $usuario->setId_tipo_documento($filas["id_tipo_documento"]);
        $usuario->setId_genero($filas["id_genero"]);
        $usuario->setId_tipo_usuario($filas["id_tipo_usuario"]);

        return $usuario;
    }

    
    /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function login($usuario)
    {
        $query = "SELECT * FROM usuario WHERE usuario = :usuario AND contrasena = :contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usu  = $usuario->getUsuario();
        $pass = $usuario->getContrasena();


        $resultado->bindParam(":usuario", $usu);
        $resultado->bindParam(":contrasena", $pass);

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario->getUsuario()
                && $filas["contrasena"] == $usuario->getContrasena()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve para obtener o buscar un usuario por su id
     *
     * @param      object         $usuario
     * @return     object
     */
    public static function getUsuarioPorId($id_usuario)
    {
        $query = "SELECT id_usuario,nombres,apellidos,nro_documento,telefono,nacionalidad,estado,usuario, contrasena, id_tipo_documento,id_genero,id_tipo_usuario FROM usuario WHERE id_usuario= :id_usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_usuario", $id_usuario);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = new Usuario();
        $usuario->setId_usuario($filas["id_usuario"]);
        $usuario->setNombres($filas["nombres"]);
        $usuario->setApellidos($filas["apellidos"]);
        $usuario->setNro_documento($filas["nro_documento"]);
        $usuario->setTelefono($filas["telefono"]);
        $usuario->setNacionalidad($filas["nacionalidad"]);
        $usuario->setEstado($filas["estado"]);
        $usuario->setUsuario($filas["usuario"]);
        $usuario->setContrasena($filas["contrasena"]);
        $usuario->setId_tipo_documento($filas["id_tipo_documento"]);
        $usuario->setId_genero($filas["id_genero"]);
        $usuario->setId_tipo_usuario($filas["id_tipo_usuario"]);

        return $usuario;
    }

    /**
     * Metodo que sirve para eliminar un usuario
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function eliminarUsuario($id_usuario)
    {
        $query = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":id_usuario", $id_usuario);

        $resultado->execute();

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Metodo que sirve obtener o listar todos los usuarios
     *
     * @return     object
     */
        public static function getUsuarios()
        {
        $query = "SELECT id_usuario,nombres,apellidos,nro_documento,telefono,nacionalidad,estado,usuario,id_tipo_documento,id_genero,id_tipo_usuario FROM usuario";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filas = $resultado->fetchAll();

        return $filas;
    }

    

    
    /**
     * Metodo que sirve para crear y editar usuarios
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function crearUsuario($usuario) {
        if (is_null($usuario->getId_usuario())) {
            $query = "INSERT INTO usuario (nombres,apellidos,nro_documento,telefono,nacionalidad,estado,usuario,contrasena,id_tipo_documento,id_genero,id_tipo_usuario) VALUES (:nombres,:apellidos,:nro_documento,:telefono,:nacionalidad,:estado,:usuario,:contrasena,:id_tipo_documento,:id_genero,:id_tipo_usuario)";
        } else {
            $query ="UPDATE usuario SET nombres=:nombres,apellidos=:apellidos,nro_documento=:nro_documento,telefono=:telefono,nacionalidad=:nacionalidad,estado=:estado,usuario=:usuario,contrasena=:contrasena,id_tipo_documento=:id_tipo_documento,id_genero=:id_genero,id_tipo_usuario=:id_tipo_usuario WHERE id_usuario=:id_usuario)";
        }
        
        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        
        $nombres        = $usuario->getNombres();
        $apellidos       = $usuario->getApellidos();
        $nro_documento      = $usuario->getNro_documento();
        $telefono       = $usuario->getTelefono();
        $nacionalidad   = $usuario->getNacionalidad();
        $estado        = $usuario->getEstado();
        $usu         = $usuario->getUsuario();
        $contrasena          = $usuario->getContrasena();
        $id_tipo_documento    = $usuario->getId_tipo_documento();
        $id_genero        = $usuario->getId_genero();
        $id_tipo_usuario      = $usuario->getId_tipo_usuario();
        
        if (!is_null($usuario->getId_usuario())) {
            $id_usuario = $usuario->getId_usuario();
            $resultado->bindParam(":id_usuario", $id_usuario);
        } 

        $resultado->bindParam(":nombres", $nombres);
        $resultado->bindParam(":apellidos", $apellidos);
        $resultado->bindParam(":nro_documento", $nro_documento);
        $resultado->bindParam(":telefono", $telefono);
        $resultado->bindParam(":nacionalidad", $nacionalidad);
        $resultado->bindParam(":estado", $estado);
        $resultado->bindParam(":usuario", $usu);
        $resultado->bindParam(":contrasena", $contrasena);
        $resultado->bindParam(":id_tipo_documento", $id_tipo_documento);
        $resultado->bindParam(":id_genero", $id_genero);
        $resultado->bindParam(":id_tipo_usuario", $id_tipo_usuario);

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
     }
   
