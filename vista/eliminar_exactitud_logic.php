<?php

include '../controlador/ExactitudControlador.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["id_exactitud"])
    ) {

        $exactitud = ($_GET["id_exactitud"]);

        if (ExactitudControlador::eliminarExactitudes($exactitud)) {

            header("Location:list_exactitudes.php");
        }
    }
} else {

    header("Location:list_exactitudes.php?error=1");
}


