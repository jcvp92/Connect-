<?php

include '../controlador/ProtocolosControlador.php';

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_protocolo"]) &&
        isset($_POST["txtCodigo_pq"]) && isset($_POST["txtTrazabilidad"]) &&
        isset($_POST["txtincertidumbre"]) && isset($_POST["txtcomentarios"]) &&
        isset($_POST["txtEsquema"])

    ) {
        $txtid_protocolo = ($_POST["txtid_protocolo"]);
        $txtCodigo_pq = ($_POST["txtCodigo_pq"]);
        $txtTrazabilidad =  ($_POST["txtTrazabilidad"]);
        $txtincertidumbre =  ($_POST["txtincertidumbre"]);
        $txtcomentarios =  ($_POST["txtcomentarios"]);
        $txtEsquema =  ($_POST["txtEsquema"]);



        if (isset($_POST["id_protocolo"])) {
            $protocolo = ProtocolosControlador::crearProtocolos(
                $txtid_protocolo,
                $txtCodigo_pq,
                $txtTrazabilidad,
                $txtincertidumbre,
                $txtcomentarios,
                $txtEsquema,

                'editar');

            if ($protocolo) {
                header("Location:list_protocolos.php");

            }
        }

    } else {

        header("location:crear_protocolo_form.php?error=1");
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = 1;
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }

}

