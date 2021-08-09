<?php

include '../controlador/ClienteControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtid_cliente"]) && isset($_POST["txtNit"]) &&
        isset($_POST["txtRazon_social"]) && isset($_POST["txtdireccion_cliente"]) &&
        isset($_POST["txtResponsable"]) &&
        isset($_POST["txtTelefono_clien"]) && isset($_POST["txtCelular_cliente"]) &&
        isset($_POST["txtCodigo_ciudad"])
    ) {

        $txtid_cliente = ($_POST["txtid_cliente"]);
        $txtNit = ($_POST["txtNit"]);
        $txtRazon_social = ($_POST["txtRazon_social"]);
        $txtdireccion_cliente = ($_POST["txtdireccion_cliente"]);
        $txtResponsable = ($_POST["txtResponsable"]);
        $txtTelefono_clien = ($_POST["txtTelefono_clien"]);
        $txtCelular_cliente = ($_POST["txtCelular_cliente"]);
        $txtCodigo_ciudad = ($_POST["txtCodigo_ciudad"]);


        if (ClienteControlador::crearCliente($txtid_cliente, $txtNit, $txtRazon_social, $txtdireccion_cliente, $txtResponsable, $txtTelefono_clien, $txtCelular_cliente, $txtCodigo_ciudad, "nuevo")) {
            header("location:list_clientes.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_clientes.php\">";
        }

        $filas = ClienteControlador::getCliente(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">ID</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">NIT</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">RAZON SOCIAL</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">DIRRECCIÓN CLIENTE</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">RESPONSABLE</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">TELEFONO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CELULAR</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CODIGO CIUDAD</th>
                    <th colspan="2" scope="col"  id="colu" style="font-family: Arial; text-align: left">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $cliente) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_cliente.php?id_cliente=' . $cliente["id_cliente"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian light; font-size: 22px; text-align: center">' . $cliente["id_cliente"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $cliente["Nit"]. '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $cliente["Razon_social"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' .$cliente["dirección_cliente"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $cliente["Responsable"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' .$cliente["Telefono_clien"]. '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $cliente["Celular_cliente"]. '</td>
                <td style="font-family: Algerian light; font-size: 20px; text-align: center">' . $cliente["Codigo_ciudad"]. '</td>
                <td>
                   <a href="crear_cliente_form.php?id_cliente='. $cliente["id_cliente"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar este cliente?\'), \'eliminar_cliente_logic.php?id_cliente=' . $cliente["id_cliente"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_cliente.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">CLIENTE NO EXISTE</div>';
    }
}
