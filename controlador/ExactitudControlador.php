<?php

include '../datos/ExactitudDao.php';

class ExactitudControlador
{
    private static $obj_exactitud;

    // function para codigos postales.
    public static function getProtocolo() {
        return ExactitudDao::getProtocolos();
    }

    public static function getExactitudess($page, $dato="")
    {
        return ExactitudDao::getExactitudes($page, $dato);
    }

    public static function crearExactitudes($id_exactitud,$Carga_exa, $indicacion_exa,$Error_exa,$id_protocolo, $Accion)
    {
        self::$obj_exactitud = new Exactitud();
        self::$obj_exactitud->setid_exactitud($id_exactitud);
        self::$obj_exactitud->setCarga_exa($Carga_exa);
        self::$obj_exactitud->setindicacion_exa($indicacion_exa);
        self::$obj_exactitud->setError_exa($Error_exa);
        self::$obj_exactitud->setid_protocolo($id_protocolo);
        self::$obj_exactitud->setAccion($Accion);

        return ExactitudDao::crudExactitudes(self::$obj_exactitud);

    }

    public static function editarExactitudes($id_exactitud)
    {
        self::$obj_exactitud = new Exactitud();
        self::$obj_exactitud->setid_exactitud($id_exactitud);

        return ExactitudDao::idExactitudes(self::$obj_exactitud);
    }

    // funcion para eliminar registro por exactitud

    public static function eliminarExactitudes($id_exactitud)
    {
        self::$obj_exactitud = new Exactitud();
        self::$obj_exactitud->setid_exactitud($id_exactitud);
        self::$obj_exactitud->setAccion("eliminar");
        return ExactitudDao::crudExactitudes(self::$obj_exactitud);
    }
}
