
<?php

include '../controlador/ClienteControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["id_cliente"])
    ) {


        $Cliente = ($_GET["id_cliente"]);

        if (ClienteControlador::eliminarCliente($Cliente)) {
            header("Location:list_clientes.php");
        }
    }
} else {

    header("Location:list_cliente.php?error=1");
}