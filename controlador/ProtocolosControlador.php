<?php

include '../datos/ProtocolosDao.php';

class ProtocolosControlador
{
    private static $obj_protocolo;


    public static function getProtocolos($page,$dato="")
    {
        return ProtocolosDao::getProtocolos($page, $dato);

    }

    public static function crearProtocolos($id_protocolo,$Codigo_pq, $Trazabilidad,$incertidumbre,$comentarios,$Esquema,$Accion)
    {
        self::$obj_protocolo = new Protocolos();
        self::$obj_protocolo->setid_protocolo($id_protocolo);
        self::$obj_protocolo->setCodigo_pq($Codigo_pq);
        self::$obj_protocolo->setTrazabilidad($Trazabilidad);
        self::$obj_protocolo->setincertidumbre($incertidumbre);
        self::$obj_protocolo->setcomentarios($comentarios);
        self::$obj_protocolo->setEsquema($Esquema);
        self::$obj_protocolo->setAccion($Accion);


        return ProtocolosDao::crudProtocolos(self::$obj_protocolo);

    }

    public static function editarProtocolos($id_protocolo)
    {
        self::$obj_protocolo = new Protocolos();
        self::$obj_protocolo->setid_protocolo($id_protocolo);

        return ProtocolosDao::editarProtocolo(self::$obj_protocolo);
    }

    // funcion para eliminar registro por protocolo

    public static function eliminarProtocolo($id_protocolo)
    {
        self::$obj_protocolo = new Protocolos();
        self::$obj_protocolo->setid_protocolo($id_protocolo);
        self::$obj_protocolo->setAccion("eliminar");
        return ProtocolosDao::crudProtocolos(self::$obj_protocolo);
    }
}
