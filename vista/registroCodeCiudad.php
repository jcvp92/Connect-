<?php

include '../controlador/CiudadesControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtCodigo_ciudad"]) && isset($_POST["txtUbicacion"]) &&
        isset($_POST["txtdepartamentos"])
    ) {

        $txtCodigo_ciudad = ($_POST["txtCodigo_ciudad"]);
        $txtUbicacion = ($_POST["txtUbicacion"]);
        $txtdepartamentos = ($_POST["txtdepartamentos"]);

        if (CiudadesControlador::crearCiudad($txtCodigo_ciudad,$txtUbicacion, $txtdepartamentos, "nuevo"  )) {
            header("location:list_ciudades.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_ciudades.php\">";
        }

        $filas = CiudadesControlador::getCiudades(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Arial;  text-align: center">CODIGO</th>
                    <th scope="col" id="colu" style="font-family: Arial;  text-align: center">UBICACIÓN</th>
                    <th scope="col" id="colu" style="font-family: Arial;  text-align: center">DEPARTAMENTOS</th>
                    <th colspan="2" scope="col"  id="colu"  style="font-family: Arial; text-align: left">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $ciudad) {
            $salidaBody = $salidaBody . '<tr>
                 <td style="font-family: Algerian light; font-size: 22px; text-align: center"> <a href="ver_datos_ciudad.php?Codigo_ciudad=' . $ciudad["Codigo_ciudad"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian light; font-size: 20px; text-align: center">' . $ciudad["Codigo_ciudad"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $ciudad["Ubicación"]. '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $ciudad["departamentos"] . '</td>   
                <td>
                   <a href="crear_ciudad_form.php?Codigo_ciudad='. $ciudad["Codigo_ciudad"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar esta dato?\'), \'eliminar_ciudad_logic.php?Codigo_ciudad=' . $ciudad["Codigo_ciudad"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_ciudad.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">CIUDAD NO EXISTE</div>';

    }
}
