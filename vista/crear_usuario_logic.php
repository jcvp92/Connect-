<?php

include '../controlador/UsuarioControlador.php';


session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (
        isset($_POST["txtCedula"]) &&
        isset($_POST["txtNombres"]) && isset($_POST["txtApellidos"]) &&
        isset($_POST["txtCargo"]) && isset($_POST["txtTel_usu"]) &&
        isset($_POST["txtTipo_de_usuario"]) && isset($_POST["txtNickname"]) &&
        isset($_POST["txtContraseña"]) && 
        isset($_POST["txtcorreo_electronico"]) && isset($_POST["txtCodigo_sede"])

    ) {
        $txtCedula = ($_POST["txtCedula"]);
        $txtNombres = ($_POST["txtNombres"]);
        $txtApellidos = ($_POST["txtApellidos"]);
        $txtCargo = ($_POST["txtCargo"]);
        $txtTel_usu = ($_POST["txtTel_usu"]);
        $txtTipo_de_usuario = ($_POST["txtTipo_de_usuario"]);
        $txtNickname = ($_POST["txtNickname"]);
        $txtContraseña = ($_POST["txtContraseña"]);
        $txtcorreo_electronico = ($_POST["txtcorreo_electronico"]);
        $txtCodigo_sede = ($_POST["txtCodigo_sede"]);

            // para actualizar la imagen.
            if(!is_null($_FILES['txtFoto']['name']) && $_FILES['txtFoto']['name'] != "") {
                $txtFoto = $_FILES['txtFoto']['name'];//Nombre de la foto00
                $ruta = $_FILES['txtFoto']['tmp_name'];//ruta o path del archivo
                $foto = '../Uploads/Usuarios/' . time() . $txtFoto; //ruta y nombre del archivo
                copy($ruta, $foto);//Guarda archivo en ruta especifica
            } else {
                $foto = $_POST['txtFotoAnt'];
            }

        if (isset($_POST["txtCedula"])) {
            $usuario = UsuarioControlador::crearUsuario(
                $txtCedula,
                $txtNombres,
                $txtApellidos,
                $txtCargo,
                $txtTel_usu,
                $txtTipo_de_usuario,
                $txtNickname,
                $txtContraseña,
                $foto,
                $txtcorreo_electronico,
                $txtCodigo_sede,
                'editar'
            );

            if ($usuario) {
                header("Location:list_usuarios.php");
            }
        }
    }
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $page = 1;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        }

        $fila = UsuarioControlador::getUsuarios($page);
    }
}
