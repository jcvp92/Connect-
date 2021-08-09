<?php

include '../controlador/ProtocolosControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_protocolo"]) && isset($_POST["txtCodigo_pq"]) &&
        isset($_POST["txtTrazabilidad"]) && isset($_POST["txtincertidumbre"]) &&
        isset($_POST["txtcomentarios"]) &&
        isset($_POST["txtEsquema"])
    ) {

        $txtid_protocolo = ($_POST["txtid_protocolo"]);
        $txtCodigo_pq = ($_POST["txtCodigo_pq"]);
        $txtTrazabilidad = ($_POST["txtTrazabilidad"]);
        $txtincertidumbre = ($_POST["txtincertidumbre"]);
        $txtcomentarios = ($_POST["txtcomentarios"]);
        $txtEsquema = ($_POST["txtEsquema"]);

        if (ProtocolosControlador::crearProtocolos($txtid_protocolo,$txtCodigo_pq,$txtTrazabilidad,$txtincertidumbre,$txtcomentarios,$txtEsquema,"nuevo")) {
            header("location:list_protocolos.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_protocolos.php\">";
        }

        $filas = ProtocolosControlador::getProtocolos(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">ID</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">CODIGO</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">TRAZABILIDAD</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">INCERTIDUMBRE</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">COMENTARIOS</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">ESQUEMA</th>
                    <th colspan="2" scope="col"  id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: left">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $protocolo) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_protocolos.php?id_protocolo=' . $protocolo["id_protocolo"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian; font-size: 22px; text-align: center">' . $protocolo["id_protocolo"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' . $protocolo["Codigo_pq"]. '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' . $protocolo["Trazabilidad"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' .$protocolo["Incertidumbre"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' . $protocolo["comentarios"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' .$protocolo["Esquema"]. '</td>
                <td>
                    <a href="crear_protocolo_form.php?id_protocolo='. $protocolo["id_protocolo"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar este protocolo?\'), \'eliminar_protocolo_logic.php?id_protocolo=' . $protocolo["id_protocolo"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_protocolo.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">PROTOCOLO NO EXISTE</div>';
    }
}
