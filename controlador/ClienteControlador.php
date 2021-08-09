<?php

include '../datos/ClienteDao.php';

// creamos la clase cliente para instanciar los objetos.
class ClienteControlador
{
    private static $obj_cliente;

// function para codigos postales.
   public static function getCiudad() {
       return ClienteDao::getCiudades();
   }

// funcion para paginar registro de cliente.
    public static function getCliente($page,$dato="")
    {
        return ClienteDao::getClientes($page, $dato);

    }
// metodo  para registrar clientes.
    public static function crearCliente($id_cliente,$Nit, $Razon_social, $direccion_cliente, $Responsable, $Telefono_clien,$Celular_cliente,$Codigo_ciudad,$Accion)
    {
        self::$obj_cliente = new Cliente();
        self::$obj_cliente->setid_cliente($id_cliente);
        self::$obj_cliente->setNit($Nit);
        self::$obj_cliente->setRazon_social($Razon_social);
        self::$obj_cliente->setdireccion_cliente($direccion_cliente);
        self::$obj_cliente->setResponsable($Responsable);
        self::$obj_cliente->setTelefono_clien($Telefono_clien);
        self::$obj_cliente->setCelular_cliente($Celular_cliente);
        self::$obj_cliente->setCodigo_ciudad($Codigo_ciudad);
        self::$obj_cliente->setAccion($Accion);

        return ClienteDao::crudClientes(self::$obj_cliente);
    }
// metodo donde edita cliente por id.
    public static function editarCliente($id_cliente)
    {
        self::$obj_cliente = new Cliente();
        self::$obj_cliente->setid_cliente($id_cliente);

        return ClienteDao::editarClientes(self::$obj_cliente);

    }
// metodo para eliminar por registro por id cliente,

    public static function eliminarCliente($id_cliente)
    {
        self::$obj_cliente = new Cliente();
        self::$obj_cliente->setId_cliente($id_cliente);
        self::$obj_cliente->setAccion("eliminar");
        return ClienteDao::crudClientes(self::$obj_cliente);

    }
}



