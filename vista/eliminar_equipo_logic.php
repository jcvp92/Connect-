
<?php

include '../controlador/EquiposControlador.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["id_equipo"])
    ) {

        $Equipo = ($_GET["id_equipo"]);

        if (EquiposControlador::eliminarEquipo($Equipo)) {
            header("Location:list_equipos.php");
        }
    }
} else {

    header("Location:list_equipos.php?error=1");
}