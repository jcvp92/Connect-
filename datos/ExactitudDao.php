<?php
include '../datos/Conexion.php';
include '../entidades/Exactitud.php';

class ExactitudDao extends Conexion
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


    public static function idExactitudes($exactitud)
    {

        $query = "SELECT * FROM EXACTITUD WHERE id_exactitud = :id_exactitud";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_exactitud", $exactitud->getid_exactitud());


        $resultado->execute();

        $filas = $resultado->fetch();

        
        $exactitud = new Exactitud();
        $exactitud->setid_exactitud($filas["id_exactitud"]);
        $exactitud->setCarga_exa($filas["Carga_exa"]);
        $exactitud->setindicacion_exa($filas["Indicacion_exa"]);
        $exactitud->setError_exa($filas["Error_exa"]);
        $exactitud->setid_protocolo($filas["id_protocolo"]);




        return $exactitud;
    }
    public static function crudExactitudes($exactitud)
    {

        $query = "CALL crud_exactitud(:id_exactitud,:Carga_exa,:indicacion_exa,:Error_exa,:id_protocolo,:Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_exactitud", $exactitud->getid_exactitud());
        $resultado->bindValue(":Carga_exa", $exactitud->getCarga_exa());
        $resultado->bindValue(":indicacion_exa", $exactitud->getindicacion_exa());
        $resultado->bindValue(":Error_exa", $exactitud->getError_exa());
        $resultado->bindValue(":id_protocolo", $exactitud->getid_protocolo());
        $resultado->bindValue(":Accion", $exactitud->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {


            return true;
        }

    }
    public static function getProtocolos()
    {
        $query = "SELECT * FROM protocolos";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }

    public static function getExactitudes($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM exactitud WHERE id_exactitud LIKE '%$dato%' OR Carga_exa LIKE '%$dato%' OR Indicacion_exa LIKE '%$dato%' OR Error_exa LIKE '%$dato%' OR id_protocolo  LIKE '$dato'";//
        } else if ($page != null) {
            $query = "SELECT * FROM exactitud limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM exactitud WHERE id_exactitud";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}




