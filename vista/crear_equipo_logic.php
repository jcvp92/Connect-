<?php

include '../controlador/EquiposControlador.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_equipo"]) &&
        isset($_POST["txtModelo"]) && isset($_POST["txtFabricante"]) &&
        isset($_POST["txtSerial"]) && isset($_POST["txtUbicacion"]) &&
        isset($_POST["txtCodigo_interno"]) && isset($_POST["txtid_tipo"])

    ) {
        $txtid_equipo = ($_POST["txtid_equipo"]);
        $txtModelo = ($_POST["txtModelo"]);
        $txtFabricante =  ($_POST["txtFabricante"]);
        $txtSerial = ($_POST["txtSerial"]);
        $txtUbicacion =  ($_POST["txtUbicacion"]);
        $txtCodigo_interno = ($_POST["txtCodigo_interno"]);
        $txtid_tipo =  ($_POST["txtid_tipo"]);


        if (isset($_POST["txtid_equipo"])) {
            $equipo = EquiposControlador::crearEquipo(
                $txtid_equipo,
                $txtModelo,
                $txtFabricante,
                $txtSerial,
                $txtUbicacion,
                $txtCodigo_interno,
                $txtid_tipo,

                'editar');

            if ($equipo) {
                header("Location:list_equipos.php");

            }
        }

    } else {

        header("location:crear_equipo_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}

