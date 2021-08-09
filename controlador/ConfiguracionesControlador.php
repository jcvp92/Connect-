<?php

include '../datos/ConfiguracionesDao.php';

class ConfiguracionesControlador
{
    private static $obj_configuracion;


    public static function getConfiguracioness($page, $dato="")
    {
        return ConfiguracionesDao::getConfiguracionesd($page, $dato);
    }

    public static function crearConfiguracion($codigo, $tipo_config,$Descripcion_config,$Estado,$valor, $Accion)
    {
        self::$obj_configuracion = new Configuraciones();
        self::$obj_configuracion->setcodigo($codigo);
        self::$obj_configuracion->settipo_config($tipo_config);
        self::$obj_configuracion->setDescripcion_config($Descripcion_config);
        self::$obj_configuracion->setEstado($Estado);
        self::$obj_configuracion->setvalor($valor);
        self::$obj_configuracion->setAccion($Accion);

        return ConfiguracionesDao::crudConfiguraciones(self::$obj_configuracion);

    }

    public static function editarConfiguracion($codigo)
    {
        self::$obj_configuracion = new Configuraciones();
        self::$obj_configuracion->setcodigo($codigo);

        return ConfiguracionesDao::idConfiguracion(self::$obj_configuracion);
    }

    // funcion para eliminar registro por codigo

    public static function eliminarConfiguracion($codigo)
    {
        self::$obj_configuracion = new Configuraciones();
        self::$obj_configuracion->setcodigo($codigo);
        self::$obj_configuracion->setAccion("eliminar");
        return ConfiguracionesDao::crudConfiguraciones(self::$obj_configuracion);
    }
}

