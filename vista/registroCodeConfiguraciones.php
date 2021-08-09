<?php

include '../controlador/ConfiguracionesControlador.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtcodigo"]) && isset($_POST["txttipo_config"]) &&
        isset($_POST["txtDescripcion_config"]) && isset($_POST["txtEstado"]) &&
        isset($_POST["txtvalor"])
    ) {

        $txtcodigo = ($_POST["txtcodigo"]);
        $txttipo_config = ($_POST["txttipo_config"]);
        $txtDescripcion_config = ($_POST["txtDescripcion_config"]);
        $txtEstado = ($_POST["txtEstado"]);
        $txtvalor = ($_POST["txtvalor"]);

        if (ConfiguracionesControlador::crearConfiguracion($txtcodigo,$txttipo_config,$txtDescripcion_config,$txtEstado,$txtvalor,"nuevo")) {
            header("location:list_configuraciones.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_configuraciones.php\">";
        }

        $filas = ConfiguracionesControlador::getConfiguracioness(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu">Codigo</th>
                    <th scope="col" id="colu">Tipo Configuracion</th>
                    <th scope="col" id="colu">Descripcion Configuracion</th>
                    <th scope="col" id="colu">Estado</th>
                    <th scope="col" id="colu">Valor</th>
                    <th colspan="2" scope="col"  id="colu">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $configuracion) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos_configuraciones.php?codigo=' . $configuracion["codigo"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td>' . $configuracion["codigo"] . '</td>
                <td>' . $configuracion["tipo_config"]. '</td>
                <td>' . $configuracion["Descripcion_config"] . '</td>
                <td>' .$configuracion["Estado"] . '</td>
                <td>' . $configuracion["valor"] . '</td>
                <td>
                   <a href="crear_configuracion_form.php?codigo='. $configuracion["codigo"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar?\'), \'eliminar_configuracion_logic.php?codigo=' . $configuracion["codigo"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_configuracion.php?error=1");
    }

    if (empty($filas)) {
        echo '<div class="alert alert-info">NO EXISTE</div>';
    }
}
