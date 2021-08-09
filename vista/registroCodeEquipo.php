<?php

include '../controlador/EquiposControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_equipo"]) && isset($_POST["txtModelo"]) &&
        isset($_POST["txtFabricante"]) && isset($_POST["txtSerial"]) &&
        isset($_POST["txtUbicacion"]) &&
        isset($_POST["txtCodigo_interno"]) && isset($_POST["txtid_tipo"])
    ) {

        $txtid_equipo = ($_POST["txtid_equipo"]);
        $txtModelo = ($_POST["txtModelo"]);
        $txtFabricante = ($_POST["txtFabricante"]);
        $txtSerial = ($_POST["txtSerial"]);
        $txtUbicacion = ($_POST["txtUbicacion"]);
        $txtCodigo_interno = ($_POST["txtCodigo_interno"]);
        $txtid_tipo = ($_POST["txtid_tipo"]);


        if (EquiposControlador::crearEquipo($txtid_equipo, $txtModelo, $txtFabricante, $txtSerial, $txtUbicacion, $txtCodigo_interno, $txtid_tipo, "nuevo")) {
            header("location:list_equipos.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_equipos.php\">";
        }

        $filas = EquiposControlador::getEquipo(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">ID</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">MODELO</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">FABRICANTE</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">SERIAL</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">UBICACION</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">CODIGO INTERNO</th>
                    <th scope="col" id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: center">ID TIPO</th>
                    <th colspan="2" scope="col"  id="colu" style="font-family: Bahnschrift; font-size: 20px; text-align: left">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $equipo) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_equipo.php?id_equipo=' . $equipo["id_equipo"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian; font-size: 22px; text-align: center">' . $equipo["id_equipo"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' . $equipo["Modelo"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' . $equipo["Fabricante"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' .$equipo["Serial"] . '</td>
                <td  style="font-family: Arial; font-size: 20px; text-align: center">' . $equipo["Ubicación"] . '</td>
                <td style="font-family: Arial; font-size: 20px; text-align: center">' .$equipo["Codigo_interno"]. '</td>
                <td style="font-family: Algerian; font-size: 22px; text-align: center">' . $equipo["id_tipo"]. '</td>
                <td>
                   <a href="crear_equipo_form.php?id_equipo='. $equipo["id_equipo"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar este equipo?\'), \'eliminar_equipo_logic.php?id_equipo=' . $equipo["id_equipo"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_equipo.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">EQUIPO NO EXISTE</div>';
    }
}
