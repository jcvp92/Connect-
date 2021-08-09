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

    /**
     * Metodo que sirve para validar el login
     */

    public static function login($usuario)
    {

        $query = "SELECT * FROM usuarios WHERE Nickname= :Nickname AND Contraseña= :Contrasena";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $usu = $usuario->getNickname();
        $pass = $usuario->getContraseña();

        $resultado->bindValue(":Nickname", $usu);
        $resultado->bindValue(":Contrasena", $pass);

        $resultado->execute();
        /**
         * Evitar Inyecciones sql
         */
        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if (
                $filas["Nickname"] == $usuario->getNickname()
                && $filas["Contraseña"] == $usuario->getContraseña()

            ) {
                return true;
            }
        }

        return false;
    }


    public static function getListarsedes()
    {
        $query = "SELECT Codigo_sede,Nombre,Dirección,Telefono FROM sedes";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->execute();

        $filassedes = $resultado->fetchAll();


        return $filassedes;
    }


    public static function getUsuario($usuario)

    {
        $query = "CALL crud_usuarios(:Cedula,:Nombres,:Apellidos,:Cargo,:Tel_usu,:Tipo_de_usuario,:Nickname,:Contrasena,:Foto,:Correo_electronico,:Codigo_sede,:Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);


        $resultado->bindValue(":Cedula", $usuario->getCedula());
        $resultado->bindValue(":Nombres", $usuario->getNombres());
        $resultado->bindValue(":Apellidos", $usuario->getApellidos());
        $resultado->bindValue(":Cargo", $usuario->getCargo());
        $resultado->bindValue(":Tel_usu", $usuario->getTel_usu());
        $resultado->bindValue(":Tipo_de_usuario", $usuario->getTipo_de_usuario());
        $resultado->bindValue(":Nickname", $usuario->getNickname());
        $resultado->bindValue(":Contrasena", $usuario->getContraseña());
        $resultado->bindValue(":Foto", $usuario->getFoto());
        $resultado->bindValue(":Correo_electronico", $usuario->getCorreo_electronico());
        $resultado->bindValue(":Codigo_sede", $usuario->getCodigo_sede());
        $resultado->bindValue(":Accion", $usuario->getAccion());

        $resultado->execute();


        $filas = $resultado->fetch();


        $usuario = new Usuario();
        $usuario->setCedula($filas["Cedula"]);
        $usuario->setNombres($filas["Nombres"]);
        $usuario->setApellidos($filas["Apellidos"]);
        $usuario->setCargo($filas["Cargo"]);
        $usuario->setTel_usu($filas["Tel_usu"]);
        $usuario->setTipo_de_usuario($filas["tipo_de_usuario"]);
        $usuario->setNickname($filas["Nickname"]);
        $usuario->setContraseña($filas["Contraseña"]);
        $usuario->setFoto($filas["Foto"]);
        $usuario->setCorreo_electronico($filas["correo_electronico"]);
        $usuario->setCodigo_sede($filas["Codigo_sede"]);


        return $usuario;
    }


    public static function EditarUsuario($usuario)
    {

        $query = "SELECT * FROM USUARIOS WHERE Cedula = :Cedula";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Cedula", $usuario->getCedula());


        $resultado->execute();

        $filas = $resultado->fetch();


        $usuario = new Usuario();
        $usuario->setCedula($filas["Cedula"]);
        $usuario->setNombres($filas["Nombres"]);
        $usuario->setApellidos($filas["Apellidos"]);
        $usuario->setCargo($filas["Cargo"]);
        $usuario->setTel_usu($filas["Tel_usu"]);
        $usuario->setTipo_de_usuario($filas["tipo_de_usuario"]);
        $usuario->setNickname($filas["Nickname"]);
        $usuario->setContraseña($filas["Contraseña"]);
        $usuario->setFoto($filas["Foto"]);
        $usuario->setCorreo_electronico($filas["correo_electronico"]);
        $usuario->setCodigo_sede($filas["Codigo_sede"]);

        return $usuario;
    }


    public static function crudUsuarios($usuario)
    {

        $query = "CALL crud_usuarios(:Cedula,:Nombres,:Apellidos,:Cargo,:Tel_usu,:Tipo_de_usuario,:Nickname,:Contrasena,:Foto,:Correo_electronico,:Codigo_sede,:Accion)";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Cedula", $usuario->getCedula());
        $resultado->bindValue(":Nombres", $usuario->getNombres());
        $resultado->bindValue(":Apellidos", $usuario->getApellidos());
        $resultado->bindValue(":Cargo", $usuario->getCargo());
        $resultado->bindValue(":Tel_usu", $usuario->getTel_usu());
        $resultado->bindValue(":Tipo_de_usuario", $usuario->getTipo_de_usuario());
        $resultado->bindValue(":Nickname", $usuario->getNickname());
        $resultado->bindValue(":Contrasena", $usuario->getContraseña());
        $resultado->bindValue(":Foto", $usuario->getFoto());
        $resultado->bindValue(":Correo_electronico", $usuario->getCorreo_electronico());
        $resultado->bindValue(":Codigo_sede", $usuario->getCodigo_sede());
        $resultado->bindValue(":Accion", $usuario->getAccion());

        $usuario = self::EditarUsuario($usuario);
        // traemos la ruta de la foto y unlink lo utlizamos para borrar el archivo de la carpeta (imagen)

        if ($resultado->execute()) {
            unlink($usuario->getFoto());
            return true;
        } else {
            return false;
        }
    }

    /**
     * Metodo que sirve para obtener todos los usuarios Listar
     * registro de usuario por tabla paginadas
     */


    public static function getUsuarios($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM usuarios WHERE Cedula LIKE '%$dato%' OR Nombres LIKE '%$dato%' OR Apellidos LIKE '%$dato%' OR Cargo LIKE '%$dato%' OR Tel_usu  LIKE '$dato' OR tipo_de_usuario  LIKE '$dato' OR Nickname  LIKE '$dato' OR Contraseña  LIKE '$dato' OR Foto  LIKE '$dato' OR correo_electronico  LIKE '$dato' OR Codigo_sede  LIKE '$dato'";//
        } else if ($page != null) {
            $query = "SELECT Cedula, Nombres, Apellidos, Cargo, Tel_usu, Tipo_de_usuario, Nickname,Contraseña, Foto, correo_electronico, Codigo_sede FROM usuarios limit 10 offset " . strval(($page * 10 - 10));
        } else {
            $query = "SELECT * FROM usuarios WHERE Cedula";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}

    //---------------------------------------------------------------------------------------------------------------------------



