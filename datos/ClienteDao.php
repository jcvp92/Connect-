<?php
include '../datos/Conexion.php';
include '../entidades/Cliente.php';

// se extiende la conexion instanciando la clase.
class ClienteDao extends Conexion
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
    public static function editarClientes($cliente)
    {
        $query = "SELECT * FROM CLIENTES WHERE id_cliente = :id_cliente";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_cliente", $cliente->getid_cliente());

        $resultado->execute();

        $filas = $resultado->fetch();

        $cliente = new Cliente();
        $cliente->setid_cliente($filas["id_cliente"]);
        $cliente->setNit($filas["Nit"]);
        $cliente->setRazon_social($filas["Razon_social"]);
        $cliente->setdireccion_cliente($filas["dirección_cliente"]);
        $cliente->setResponsable($filas["Responsable"]);
        $cliente->setTelefono_clien($filas["Telefono_clien"]);
        $cliente->setCelular_cliente($filas["Celular_cliente"]);
        $cliente->setCodigo_ciudad($filas["Codigo_ciudad"]);

        return $cliente;
    }

    // metodo para registrar clientes invocando el procedimiento almacenado con la accion
    public static function crudClientes($cliente)
    {
        // consulta donde se llama el procedimiento almacenado invocando la conexion
        $query = "CALL crud_clientes(:id_cliente,:Nit,:Razon_social,:direccion_cliente,:Responsable,:Telefono_clien,:Celular_cliente,:Codigo_ciudad,:Accion)";

        self::getConexion();
        $resultado = self::$cnx->prepare($query);

        $resultado->bindValue(":id_cliente", $cliente->getid_cliente());
        $resultado->bindValue(":Nit", $cliente->getNit());
        $resultado->bindValue(":Razon_social", $cliente->getRazon_social());
        $resultado->bindValue(":direccion_cliente", $cliente->getdireccion_cliente());
        $resultado->bindValue(":Responsable", $cliente->getResponsable());
        $resultado->bindValue(":Telefono_clien", $cliente->getTelefono_clien());
        $resultado->bindValue(":Celular_cliente", $cliente->getCelular_cliente());
        $resultado->bindValue(":Codigo_ciudad", $cliente->getCodigo_ciudad());
        $resultado->bindValue(":Accion", $cliente->getAccion());

        $resultado = $resultado->execute();

        if ($resultado != null) {

            return true;
        }
    }

    public static function getCiudades()
    {
        $query = "SELECT * FROM ciudades";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }

    public static function getClientes($page, $dato = "")
    {
        if ($dato != "") {
            $query = "SELECT * FROM clientes WHERE id_cliente LIKE '%$dato%' OR Nit LIKE '%$dato%' OR Razon_social LIKE '%$dato%' OR dirección_cliente LIKE '%$dato%' OR Responsable  LIKE '$dato' OR Telefono_clien  LIKE '$dato' OR Celular_cliente  LIKE '$dato' OR Codigo_ciudad  LIKE'$dato'";//
        } else if ($page != null) {
            $query = "SELECT * FROM clientes limit 5 offset " . strval(($page * 5 - 5));
        } else {
            $query = "SELECT * FROM clientes WHERE id_cliente";
        }
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        $filas = $resultado->fetchAll();
        return $filas;
    }
}