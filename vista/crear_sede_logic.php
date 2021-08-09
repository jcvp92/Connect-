<?php

include '../controlador/SedesControlador.php';


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtCodigo_sede"]) &&
        isset($_POST["txtNombre"]) && isset($_POST["txtDireccion"]) &&
        isset($_POST["txtTelefono"])
    ) {
        $txtCodigo_sede = ($_POST["txtCodigo_sede"]);
        $txtNombre = ($_POST["txtNombre"]);
        $txtDireccion =  ($_POST["txtDireccion"]);
        $txtTelefono = ($_POST["txtTelefono"]);


        if (isset($_POST["Codigo_sede"])) {
            $sede = SedesControlador::crearSede(
               $txtCodigo_sede,
                $txtNombre,
                $txtDireccion,
                $txtTelefono,
                'editar');

            if ($sede) {
                header("Location:list_sedes.php");

            }
        }

    } else {

        header("location:crear_sede_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}

