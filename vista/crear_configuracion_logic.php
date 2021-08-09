<?php

include '../controlador/ConfiguracionesControlador.php';


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        isset($_POST["txtcodigo"]) &&
        isset($_POST["txttipo_config"]) &&
        isset($_POST["txtDescripcion_config"]) &&
        isset($_POST["txtEstado"]) &&
        isset($_POST["txtvalor"])
    ) {
        $txtcodigo = ($_POST["txtcodigo"]);
        $txttipo_config = ($_POST["txttipo_config"]);
        $txtDescripcion_config = ($_POST["txtDescripcion_config"]);
        $txtEstado = ($_POST["txtEstado"]);
        $txtvalor = ($_POST["txtvalor"]);


        if (isset($_POST["txtcodigo"])) {
            $configuracion = ConfiguracionesControlador::crearConfiguracion(
                $txtcodigo,
                $txttipo_config,
                $txtDescripcion_config,
                $txtEstado,
                $txtvalor,
                
                'editar');

            if ($configuracion) {

                header("Location:list_configuraciones.php");
            }
        }
    } else {

        header("location:crear_configuracion_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}


