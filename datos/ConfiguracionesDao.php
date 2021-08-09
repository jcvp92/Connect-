<?php
include '../datos/Conexion.php';
include '../entidades/Configuraciones.php';

class ConfiguracionesDao extends Conexion
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
    public static function idConfiguracion($configuraciones)
    {

        $query = "SELECT * FROM CONFIGURACIONES WHERE codigo = :codigo";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":codigo", $configuraciones->getcodigo());


        $resultado->execute();

        $filas = $resultado->fetch();



        $configuraciones = new Configuraciones();
        $configuraciones->setcodigo($filas["codigo"]);
        $configuraciones->settipo_config($filas["tipo_config"]);
        $configuraciones->setDescripcion_config($filas["Descripcion_config"]);
        $configuraciones->setEstado($filas["Estado"]);
        $configuraciones->setvalor($filas["valor"]);



        return $configuraciones;
    }
    public static function crudConfiguraciones($configuracion)
    {

        $query = "CALL crud_configuraciones(:codigo,:tipo_config,:Descripcion_config,:Estado,:valor,:Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":codigo", $configuracion->getcodigo());
        $resultado->bindValue(":tipo_config", $configuracion->gettipo_config());
        $resultado->bindValue(":Descripcion_config", $configuracion->getDescripcion_config());
        $resultado->bindValue(":Estado", $configuracion->getEstado());
        $resultado->bindValue(":valor", $configuracion->getvalor());
        $resultado->bindValue(":Accion", $configuracion->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {


            return true;
        }

    }
    public static function getConfiguracionesd($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM configuraciones WHERE codigo LIKE '%$dato%' OR tipo_config LIKE '%$dato%' OR Descripcion_config LIKE '%$dato%' OR Estado LIKE '%$dato%'OR valor LIKE '%$dato%'";//
        } else if ($page != null) {
            $query = "SELECT * FROM configuraciones limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM configuraciones WHERE codigo";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}