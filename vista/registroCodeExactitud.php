<?php

include '../controlador/ExactitudControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_exactitud"]) && isset($_POST["txtCarga_exa"]) &&
        isset($_POST["txtindicacion_exa"]) && isset($_POST["txtError_exa"]) &&
        isset($_POST["txtid_protocolo"])
    ) {

        $txtid_exactitud = ($_POST["txtid_exactitud"]);
        $txtCarga_exa = ($_POST["txtCarga_exa"]);
        $txtindicacion_exa = ($_POST["txtindicacion_exa"]);
        $txtError_exa = ($_POST["txtError_exa"]);
        $txtid_protocolo = ($_POST["txtid_protocolo"]);

        if (ExactitudControlador::crearExactitudes($txtid_exactitud,$txtCarga_exa,$txtindicacion_exa,$txtError_exa,$txtid_protocolo,"nuevo")) {
            header("location:list_exactitudes.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_exactitudes.php\">";
        }
        $filas = ExactitudControlador::getExactitudess(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" STYLE="font-family: cursive">id exactitud</th>
                    <th scope="col" id="colu">Carga exactitud</th>
                    <th scope="col" id="colu">Indicacion exactitud</th>
                    <th scope="col" id="colu">Error exactitud</th>
                    <th scope="col" id="colu">id protocolo</th>
                    <th colspan="2" scope="col"  id="colu">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $exactitud) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_exactitud.php?id_exactitud=' . $exactitud["id_exactitud"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td>' . $exactitud["id_exactitud"] . '</td>
                <td>' . $exactitud["Carga_exa"]. '</td>
                <td>' . $exactitud["Indicacion_exa"] . '</td>
                <td>' .$exactitud["Error_exa"] . '</td>
                <td>' . $exactitud["id_protocolo"] . '</td>
                <td>
                   <a href="crear_exactitud_form.php?id_exactitud='. $exactitud["id_exactitud"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar?\'), \'eliminar_exactitud_logic.php?id_exactitud=' . $exactitud["id_exactitud"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_exactitud.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 20px; border-radius: 25px; font-family: cursive; background-color: #f8f3f3" class="alert alert-info" align="CENTER">ESTE REGISTRO NO EXISTE</div>';
    }
}
