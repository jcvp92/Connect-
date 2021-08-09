<?php

include '../controlador/ExactitudControlador.php';


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["txtid_exactitud"]) &&
        isset($_POST["txtCarga_exa"]) &&
        isset($_POST["txtindicacion_exa"]) &&
        isset($_POST["txtError_exa"]) &&
        isset($_POST["txtid_protocolo"])

    ) {
        $txtid_exactitud = ($_POST["txtid_exactitud"]);
        $txtCarga_exa = ($_POST["txtCarga_exa"]);
        $txtindicacion_exa = ($_POST["txtindicacion_exa"]);
        $txtError_exa = ($_POST["txtError_exa"]);
        $txtid_protocolo = ($_POST["txtid_protocolo"]);


        if (isset($_POST["txtid_exactitud"])) {
            $exactitud = ExactitudControlador::crearExactitudes(
                $txtid_exactitud,
                $txtCarga_exa,
                $txtindicacion_exa,
                $txtError_exa,
                $txtid_protocolo,


                'editar');

            if ($exactitud) {
                header("Location:list_exactitudes.php");
            }
        }
    } else {

        header("location:crear_exactitud_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}



