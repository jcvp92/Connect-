
<?php

include '../controlador/SedesControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["Codigo_sede"])
    ) {


        $sede = ($_GET["Codigo_sede"]);

        if (SedesControlador::eliminarSedes($sede)) {
            header("Location:list_sedes.php");
        }
    }
} else {

    header("Location:list_sedes.php?error=1");
}