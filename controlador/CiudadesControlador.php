<?php

include '../datos/CiudadesDao.php';

// creamos la clase ciudades para instanciar los objetos.
class CiudadesControlador
{
    private static $obj_ciudad;

// funcion para paginar registro de ciudad
    public static function getCiudades($page,$dato="")
    {
        return CiudadesDao::getCiudad($page, $dato);

    }
// metodo  para registrar ciudad.
    public static function crearCiudad($Codigo_ciudad, $Ubicacion, $Departamentos, $Accion)
    {
        self::$obj_ciudad = new Ciudades();
        self::$obj_ciudad->setCodigo_ciudad($Codigo_ciudad);
        self::$obj_ciudad->setUbicacion($Ubicacion);
        self::$obj_ciudad->setdepartamentos($Departamentos);
        self::$obj_ciudad->setAccion($Accion);

        return CiudadesDao::crudCiudades(self::$obj_ciudad);
    }
// metodo donde edita cliente por id.
    public static function editarCiudad($Codigo_ciudad)
    {
        self::$obj_ciudad = new Ciudades();
        self::$obj_ciudad->setCodigo_ciudad($Codigo_ciudad);

        return CiudadesDao::editarCiudad(self::$obj_ciudad);

    }
// metodo para eliminar por registro por id ciudad,

    public static function eliminarCiudad($Codigo_ciudad)
    {
        self::$obj_ciudad = new Ciudades();
        self::$obj_ciudad->setCodigo_ciudad($Codigo_ciudad);
        self::$obj_ciudad->setAccion("eliminar");
        return CiudadesDao::crudCiudades(self::$obj_ciudad);

    }
}

