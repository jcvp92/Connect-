<?php
include '../datos/Conexion.php';
include '../entidades/Equipos.php';

// se extiende la conexion instanciando la clase.
class EquiposDao extends Conexion
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

// metodo para editar clientes por id
    public static function editarEquipos($equipo)
    {
        $query = "SELECT * FROM EQUIPOS WHERE id_equipo = :id_equipo";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_equipo", $equipo->getid_equipo());

        $resultado->execute();

        $filas = $resultado->fetch();

        $equipo = new Equipos();
        $equipo->setid_equipo($filas["id_equipo"]);
        $equipo->setModelo($filas["Modelo"]);
        $equipo->setFabricante($filas["Fabricante"]);
        $equipo->setSerial($filas["Serial"]);
        $equipo->setUbicacion($filas["Ubicación"]);
        $equipo->setCodigo_interno($filas["Codigo_interno"]);
        $equipo->setid_tipo($filas["id_tipo"]);

        return $equipo;
    }

    // metodo para registrar equipos invocando el procedimiento almacenado con la accion
    public static function crudEquipos($equipo)
    {
        // consulta donde se llama el procedimiento almacenado invocando la conexion
        $query = "CALL crud_equipos(:id_equipo, :Modelo, :Fabricante, :Serial, :Ubicacion, :Codigo_interno, :id_tipo, :Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_equipo", $equipo->getid_equipo());
        $resultado->bindValue(":Modelo", $equipo->getModelo());
        $resultado->bindValue(":Fabricante", $equipo->getFabricante());
        $resultado->bindValue(":Serial", $equipo->getSerial());
        $resultado->bindValue(":Ubicacion", $equipo->getUbicacion());
        $resultado->bindValue(":Codigo_interno", $equipo->getCodigo_interno());
        $resultado->bindValue(":id_tipo", $equipo->getid_tipo());
        $resultado->bindValue(":Accion", $equipo->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {

            return true;
        }
    }

    public static function getTipos()
    {
        $query = "SELECT * FROM tipos_equipos";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }

    public static function getEquipos($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM equipos WHERE id_equipo LIKE '%$dato%' OR Modelo LIKE '%$dato%' OR Fabricante LIKE '%$dato%' OR Serial LIKE '%$dato%' OR Ubicación  LIKE '$dato' OR Codigo_interno  LIKE '$dato' OR id_tipo  LIKE '$dato'";//
        } else if ($page != null) {
            $query = "SELECT * FROM equipos limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM equipos WHERE id_equipo";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}