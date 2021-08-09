<?php

include '../controlador/UsuarioControlador.php';


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["txtCedula"]) && isset($_POST["txtNombres"]) &&
        isset($_POST["txtApellidos"]) && isset($_POST["txtCargo"]) &&
        isset($_POST["txtTel_usu"]) &&
        isset($_POST["txtNickname"]) && isset($_POST["txtContraseña"]) &&
        isset($_POST["txtcorreo_electronico"]) && isset($_POST["txtCodigo_sede"])
    ) {
        $txtCedula = ($_POST["txtCedula"]);
        $txtNombres = ($_POST["txtNombres"]);
        $txtApellidos = ($_POST["txtApellidos"]);
        $txtCargo = ($_POST["txtCargo"]);
        $txtTel_usu = ($_POST["txtTel_usu"]);
        $txtTipo_de_usuario = ($_POST["taskOption"]);
        $txtNickname = ($_POST["txtNickname"]);
        $txtContraseña = ($_POST["txtContraseña"]);
        $txtcorreo_electronico = ($_POST["txtcorreo_electronico"]);
        $txtCodigo_sede = ($_POST["txtCodigo_sede"]);

        // codigo de la imagen
        $txtFoto = $_FILES['txtFoto']['name'];//Nombre de la foto
        $ruta = $_FILES['txtFoto']['tmp_name'];//ruta o path del archivo
        $foto = '../Uploads/Usuarios/' . time() . $txtFoto; //ruta y nombre del archivo
        copy($ruta, $foto);//Guarda archivo en ruta especifica

        if (UsuarioControlador::crearUsuario($txtCedula, $txtNombres, $txtApellidos, $txtCargo, $txtTel_usu, $txtTipo_de_usuario, $txtNickname, $txtContraseña, $foto, $txtcorreo_electronico, $txtCodigo_sede, "nuevo")) {
            $usuario = UsuarioControlador::getUsuario($txtNickname, $txtContraseña, "consultar");
            $_SESSION["Usuario"] = array(
                "Cedula" => $usuario->getCedula(),
                "Nombres" => $usuario->getNombres(),
                "Apellidos" => $usuario->getApellidos(),
                "Cargo" => $usuario->getCargo(),
                "Tel_usu" => $usuario->getTel_usu(),
                "tipo_de_usuario" => $usuario->getTipo_de_usuario(),
                "Nickname" => $usuario->getNickname(),
                "Contraseña" => $usuario->getContraseña(),
                "Foto" => $usuario->getFoto(),
                "correo_electronico" => $usuario->getCorreo_electronico(),
                "Codigo_sede" => $usuario->getCodigo_sede(),
                "Accion" => $usuario->getAccion()
            );

            header("location:list_usuarios.php");
        }
    } else if (isset($_POST["consulta"])) {
        $dato = $_POST["consulta"];

        if ($dato == "") {
            echo "<meta http-equiv=\"refresh\" content=\"0;URL=list_usuario.php\">";
        }

        $filas = UsuarioControlador::getUsuarios(0, $dato);
        $salidaHeader = '
        <table class="table table-hover">
            <thead style="background-color: #b11317; color: white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CEDULA </th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">NOMBRES</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">APELLIDOS</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CARGO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">TELEFONO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">TIPO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">FOTO</th>
                    <th scope="col" id="colu" style="font-family: Arial; text-align: center">CORREO</th>
                    <th colspan="2" scope="col"  id="colu" style="font-family: Arial; text-align: left">ACCIONES</th>
                </tr>
            </thead>
            <tbody class="table-striped">';
        $salidaBody = "";
        foreach ($filas as $usuario) {
            $salidaBody = $salidaBody . '<tr>
                 <td> <a href="ver_datos.php?Cedula=' . $usuario["Cedula"] . '" class="btn btn-light btn-sm mt-1"><i class="fa fa-address-book-o" aria-hidden="true"></i></a></td>
                <td style="font-family: Algerian; font-size: 22px; text-align: center">' . $usuario["Cedula"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $usuario["Nombres"]. '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $usuario["Apellidos"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' .$usuario["Cargo"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $usuario["Tel_usu"] . '</td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' .$usuario["tipo_de_usuario"]. '</td>
                <td><img style="border-radius: 150PX" width="100px" src="'.$usuario["Foto"] .'"></td>
                <td style="font-family: Bahnschrift light; font-size: 20px; text-align: center">' . $usuario["correo_electronico"]. '</td>
                <td>
                   <a href="crear_usuario_form.php?Cedula='. $usuario["Cedula"].'" class="btn btn-success btn-sm mt-1"><i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                    <a href="javascript:eliminar(confirm(\'Deseas eliminar este usuario?\'), \'eliminar_usuario_logic.php?Cedula=' . $usuario["Cedula"] .'\')" class="btn btn-danger  btn-sm mt-1  mr-5"><i class="fa fa-times fa-1x" aria-hidden="true"></i></a>
                </td>
                </tr>';
        }
        $salidaFooter = '</tbody>
                    </table>';

        echo $salidaHeader . $salidaBody . $salidaFooter; //

    } else {

        header("location:crud_usuarios.php?error=1");
    }

    if (empty($filas)) {
        echo '<div style="font-size: 25px; border-radius: 25px; font-family: Bahnschrift; background-color: #f8f3f3;" class="alert alert-info"; align="center">USUARIO NO EXISTE</div>';

    }
}
