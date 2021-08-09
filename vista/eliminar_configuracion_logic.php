
<?php

include '../controlador/ConfiguracionesControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["codigo"])
    ) {
        $configuracion = ($_GET["codigo"]);

        if (ConfiguracionesControlador::eliminarConfiguracion($configuracion)) {
            header("Location:list_configuraciones.php");
        }
    }
} else {

    header("Location:list_configuraciones.php?error=1");
}