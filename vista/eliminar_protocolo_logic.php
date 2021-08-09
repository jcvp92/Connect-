
<?php

include '../controlador/ProtocolosControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (
    isset($_GET["id_protocolo"])
    ) {
        $protocolo = ($_GET["id_protocolo"]);

        if (ProtocolosControlador::eliminarProtocolo($protocolo)) {
            header("Location:list_protocolos.php");
        }
    }
} else {

    header("Location:list_protocolos.php?error=1");
}