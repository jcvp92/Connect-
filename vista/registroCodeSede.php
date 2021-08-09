<?php

include '../controlador/SedesControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtCodigo_sede"]) && isset($_POST["txtNombre"]) &&
        isset($_POST["txtDireccion"]) && isset($_POST["txtTelefono"])
    ) {

        $txtCodigo_sede = ($_POST["txtCodigo_sede"]);
        $txtNombre = ($_POST["txtNombre"]);
        $txtDireccion = ($_POST["txtDireccion"]);
        $txtTelefono = ($_POST["txtTelefono"]);

        if (SedesControlador::crearSede($txtCodigo_sede, $txtNombre, $txtDireccion, $txtTelefono, "nuevo")) {
            header("location:list_sedes.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_sedes.php\">";
        }

        $filas = SedesControlador::getSede(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CODIGO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">NOMBRE</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">DIRECCIÓN</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">TELEFONO</th>
                    <th colspan="2" scope="col" id="colu" style="font-family: Arial; text-align: left">ACCIONES</th>
                </tr>      
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $sede) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_sede.php?Codigo_sede=' . $sede["Codigo_sede"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian light; font-size: 22px; text-align: center">' . $sede["Codigo_sede"] . '</td>
                <td style="font-family: Bahnschrift Light; font-size: 20px; text-align: center">' . $sede["Nombre"]. '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $sede["Dirección"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' .$sede["Telefono"] . '</td>
                <td>
                   <a href="crear_sede_form.php?Codigo_sede='. $sede["Codigo_sede"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar esta sede?\'), \'eliminar_sede_logic.php?Codigo_sede=' . $sede["Codigo_sede"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_sede.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">SEDE NO EXISTE</div>';
    }
}
