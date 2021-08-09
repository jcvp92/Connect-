<?php

include '../controlador/CiudadesControlador.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtCodigo_ciudad"]) &&
        isset($_POST["txtUbicacion"]) && isset($_POST["txtdepartamentos"])

    ) {
        $txtCodigo_ciudad = ($_POST["txtCodigo_ciudad"]);
        $txtUbicacion = ($_POST["txtUbicacion"]);
        $txtdepartamentos =  ($_POST["txtdepartamentos"]);

        if (isset($_POST["Codigo_ciudad"])) {
            $ciudad = CiudadesControlador::crearCiudad(
                $txtCodigo_ciudad,
                $txtUbicacion,
                $txtdepartamentos,
                'editar');

            if ($ciudad) {
                header("Location:list_ciudades.php");

            }
        }

    } else {

        header("location:crear_ciudad_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}

