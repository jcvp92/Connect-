
<?php
include '../datos/Conexion.php';
include '../entidades/Protocolos.php';

class   ProtocolosDao extends Conexion
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


    public static function editarProtocolo($protocolo)
    {

        $query = "SELECT * FROM PROTOCOLOS WHERE id_protocolo = :id_protocolo";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_protocolo", $protocolo->getid_protocolo());


        $resultado->execute();

        $filas = $resultado->fetch();



        $protocolo = new Protocolos();
        $protocolo->setid_protocolo($filas["id_protocolo"]);
        $protocolo->setCodigo_pq($filas["Codigo_pq"]);
        $protocolo->setTrazabilidad($filas["Trazabilidad"]);
        $protocolo->setincertidumbre($filas["Incertidumbre"]);
        $protocolo->setcomentarios($filas["comentarios"]);
        $protocolo->setEsquema($filas["Esquema"]);

        return $protocolo;
    }
    public static function crudProtocolos($protocolo)
    {

        $query = "CALL crud_protocolos(:id_protocolo,:Codigo_pq,:Trazabilidad,:incertidumbre, :comentarios, :Esquema, :Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_protocolo", $protocolo->getid_protocolo());
        $resultado->bindValue(":Codigo_pq", $protocolo->getCodigo_pq());
        $resultado->bindValue(":Trazabilidad", $protocolo->getTrazabilidad());
        $resultado->bindValue(":incertidumbre", $protocolo->getincertidumbre());
        $resultado->bindValue(":comentarios", $protocolo->getcomentarios());
        $resultado->bindValue(":Esquema", $protocolo->getEsquema());
        $resultado->bindValue(":Accion", $protocolo->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {


            return true;
        }
    }
    public static function getProtocolos($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM protocolos WHERE id_protocolo LIKE '%$dato%' OR Codigo_pq LIKE '%$dato%' OR Trazabilidad LIKE '%$dato%' OR Incertidumbre LIKE '%$dato%'OR comentarios LIKE '%$dato%'OR Esquema LIKE '%$dato%'";//
        } else if ($page != null) {
            $query = "SELECT * FROM protocolos limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM protocolos WHERE id_protocolo";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}