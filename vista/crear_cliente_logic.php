<?php

include '../controlador/ClienteControlador.php';


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_cliente"]) &&
        isset($_POST["txtNit"]) && isset($_POST["txtRazon_social"]) &&
        isset($_POST["txtdireccion_cliente"]) && isset($_POST["txtResponsable"]) &&
        isset($_POST["txtTelefono_clien"]) && isset($_POST["txtCelular_cliente"]) &&
        isset($_POST["txtCodigo_ciudad"])

    ) {
        $txtid_cliente = ($_POST["txtid_cliente"]);
        $txtNit = ($_POST["txtNit"]);
        $txtRazon_social =  ($_POST["txtRazon_social"]);
        $txtdireccion_cliente = ($_POST["txtdireccion_cliente"]);
        $txtResponsable =  ($_POST["txtResponsable"]);
        $txtTelefono_clien = ($_POST["txtTelefono_clien"]);
        $txtCelular_cliente =  ($_POST["txtCelular_cliente"]);
        $txtCodigo_ciudad =  ($_POST["txtCodigo_ciudad"]);


        if (isset($_POST["id_cliente"])) {
            $cliente = ClienteControlador::crearCliente(
                $txtid_cliente,
                $txtNit,
                $txtRazon_social,
                $txtdireccion_cliente,
                $txtResponsable,
                $txtTelefono_clien,
                $txtCelular_cliente,
                $txtCodigo_ciudad,
                'editar');

            if ($cliente) {
                header("Location:list_clientes.php");

            }
        }

    } else {

        header("location:crear_cliente_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}

