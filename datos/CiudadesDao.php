
<?php
include '../datos/Conexion.php';
include '../entidades/Ciudades.php';

class   CiudadesDao extends Conexion
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

    public static function editarCiudad($ciudad)
    {

        $query = "SELECT * FROM CIUDADES WHERE Codigo_ciudad = :Codigo_ciudad";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Codigo_ciudad", $ciudad->getCodigo_ciudad());


        $resultado->execute();

        $filas = $resultado->fetch();



        $ciudad = new Ciudades();
        $ciudad->setCodigo_ciudad($filas["Codigo_ciudad"]);
        $ciudad->setUbicacion($filas["Ubicación"]);
        $ciudad->setdepartamentos($filas["departamentos"]);


        return $ciudad;
    }
    public static function crudCiudades($ciudad)
    {

        $query = "CALL crud_ciudades(:Codigo_ciudad,:Ubicacion,:departamentos, :Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":Codigo_ciudad", $ciudad->getCodigo_ciudad());
        $resultado->bindValue(":Ubicacion", $ciudad->getUbicacion());
        $resultado->bindValue(":departamentos", $ciudad->getdepartamentos());
        $resultado->bindValue(":Accion", $ciudad->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {


            return true;
        }
    }

    public static function getCiudad($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM ciudades WHERE Codigo_ciudad LIKE '%$dato%' OR Ubicación LIKE '%$dato%' OR departamentos LIKE '%$dato%'";//
        } else if ($page != null) {
            $query = "SELECT * FROM ciudades limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM ciudades WHERE Codigo_ciudad";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}