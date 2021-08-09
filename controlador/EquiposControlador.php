<?php

include '../datos/EquiposDao.php';

// creamos la clase EQUIPO para instanciar los objetos.
class EquiposControlador
{
    private static $obj_equipo;

// function para codigos postales.
    public static function getTipo() {
        return EquiposDao::getTipos();
    }

// funcion para paginar registro de equipo.
    public static function getEquipo($page,$dato="")
    {
        return EquiposDao::getEquipos($page, $dato);
    }
// metodo  para registrar equipos.
    public static function crearEquipo($id_equipo, $Modelo, $Fabricante, $Serial, $Ubicacion, $Codigo_interno,$id_tipo,$Accion)
    {
        self::$obj_equipo = new Equipos();
        self::$obj_equipo->setid_equipo($id_equipo);
        self::$obj_equipo->setModelo($Modelo);
        self::$obj_equipo->setFabricante($Fabricante);
        self::$obj_equipo->setSerial($Serial);
        self::$obj_equipo->setUbicacion($Ubicacion);
        self::$obj_equipo->setCodigo_interno($Codigo_interno);
        self::$obj_equipo->setid_tipo($id_tipo);
        self::$obj_equipo->setAccion($Accion);

        return EquiposDao::crudEquipos(self::$obj_equipo);
    }
// metodo donde edita equipo por id.
    public static function editarEquipo($id_equipo)
    {
        self::$obj_equipo = new Equipos();
        self::$obj_equipo->setid_equipo($id_equipo);

        return EquiposDao::editarEquipos(self::$obj_equipo);
    }
// metodo para eliminar por registro por id equipo,

    public static function eliminarEquipo($id_equipo)
    {
        self::$obj_equipo = new Equipos();
        self::$obj_equipo->setid_equipo($id_equipo);
        self::$obj_equipo->setAccion("eliminar");
        return EquiposDao::crudEquipos(self::$obj_equipo);
    }
}

