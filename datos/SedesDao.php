
<?php
include '../datos/Conexion.php';
include '../entidades/Sedes.php';

class   SedesDao extends Conexion
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


    public static function editarSede($sedes)
    {

        $query = "SELECT * FROM SEDES WHERE Codigo_sede = :Codigo_sede";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Codigo_sede", $sedes->getCodigo_sede());


        $resultado->execute();

        $filas = $resultado->fetch();



        $sedes = new Sedes();
        $sedes->setCodigo_sede($filas["Codigo_sede"]);
        $sedes->setNombre($filas["Nombre"]);
        $sedes->setDireccion($filas["Dirección"]);
        $sedes->setTelefono($filas["Telefono"]);



        return $sedes;
    }
    public static function crudSedes($sedes)
    {

        $query = "CALL crud_sedes(:Codigo_sede,:Nombre,:Direccion,:Telefono,:Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Codigo_sede", $sedes->getCodigo_sede());
        $resultado->bindValue(":Nombre", $sedes->getNombre());
        $resultado->bindValue(":Direccion", $sedes->getDireccion());
        $resultado->bindValue(":Telefono", $sedes->getTelefono());
        $resultado->bindValue(":Accion", $sedes->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {


            return true;
        }
    }
    public static function getSede($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM sedes WHERE Codigo_sede LIKE '%$dato%' OR Nombre LIKE '%$dato%' OR Dirección LIKE '%$dato%' OR Telefono LIKE '%$dato%'";//
        } else if ($page != null) {
            $query = "SELECT * FROM sedes limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM sedes WHERE Codigo_sede";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}