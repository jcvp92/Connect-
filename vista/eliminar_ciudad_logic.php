
<?php

include '../controlador/CiudadesControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["Codigo_ciudad"])
    ) {


        $ciudad = ($_GET["Codigo_ciudad"]);

        if (CiudadesControlador::eliminarCiudad($ciudad)) {
            header("Location:list_ciudades.php");
        }
    }
} else {

    header("Location:list_ciudades.php?error=1");
}