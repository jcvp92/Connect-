<?php

include '../datos/SedesDao.php';

// creamos la clase cliente para instanciar los objetos.
class SedesControlador
{
    private static $obj_sede;

// funcion para paginar registro de cliente.
    public static function getSede($page,$dato="")
    {
        return SedesDao::getSede($page, $dato);

    }
// metodo  para registrar clientes.
    public static function crearSede($Codigo_sede, $Nombre, $Direccion, $Telefono, $Accion)
    {
        self::$obj_sede = new Sedes();
        self::$obj_sede->setCodigo_sede($Codigo_sede);
        self::$obj_sede->setNombre($Nombre);
        self::$obj_sede->setDireccion($Direccion);
        self::$obj_sede->setTelefono($Telefono);
        self::$obj_sede->setAccion($Accion);

        return SedesDao::crudSedes(self::$obj_sede);
    }
// metodo donde edita cliente por id.
    public static function editarSede($Codigo_sede)
    {
        self::$obj_sede = new Sedes();
        self::$obj_sede->setCodigo_sede($Codigo_sede);

        return SedesDao::editarSede(self::$obj_sede);

    }
// metodo para eliminar por registro por id cliente,

    public static function eliminarSedes($Codigo_sede)
    {
        self::$obj_sede = new Sedes();
        self::$obj_sede->setCodigo_sede($Codigo_sede);
        self::$obj_sede->setAccion("eliminar");
        return SedesDao::crudSedes(self::$obj_sede);

    }
}


