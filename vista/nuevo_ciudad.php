<?php

session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["Tipo_de_usuario"] != "administrador") {
        header("location:list_ciudades.php");
    }
} else {
    header("location:logueo.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metrolegal</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nuevo_usuario.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">


</head>

<body>

<?php
include "../controlador/CiudadesControlador.php";
$filassedes = CiudadesControlador::getCiudades("");
?>
<div class="container-fluid  p-0">

    <div class="row">
        <div class="col-md-3" style="height:900px; background-color: #f8fafb">
            <div class="container">
                <h3 class="text-center mt-3"><?php echo ucfirst($_SESSION["usuario"]["Tipo_de_usuario"]) ?></h3>
                <hr>

                <div class="mt-5">
                    <img id="user_image" src="<?=$_SESSION["usuario"]["Foto"] ?>" class="rounded-circle mx-auto d-block responsive img-circle  clip-circle ml-5  float-center" style="width: 120px; height: 88px; margin-top:-30px; display:inline-block;"><br />
                </div>

                <div class="mt-2 text-center">
                    <h3><strong>Hola</strong> <?php echo $_SESSION["usuario"]["Nombres"]; ?></h3>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto float-none">

                    <a href="../vista/list_usuarios.php" class="btn  btn-lg ml-1" style="font-size: 18px;"><i class="fa fa-user-o fa-md mr-2"></i>Usuarios</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/list_clientes.php" class="btn btn-lg" style="font-size: 18px;"> <i class="fa fa-users fa-md mr-2"></i>Clientes</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a  href="../vista/list_sedes.php" class="btn  btn-lg ml-1" style="font-size: 18px;"><i class="fa fa-map-marker  fa-md mr-2"></i>Sedes</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/list_ciudades.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-map-o  fa-md mr-2"></i>Ciudades</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/list_equipos.php" class="btn  btn-lg" style="font-size: 18px;"> <i class="fa fa-laptop  fa-md mr-2"></i>Equipos</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/list_protocolos.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-check-square-o  fa-md mr-2"></i>Protocolos</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/list_configuraciones.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-cog  fa-md mr-2"></i>Confugraciones</a>
                </div>
                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a  href="../vista/list_exactitudes.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-pencil  fa-md mr-2"></i>Exactitud</a>
                </div>

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-2 float-none">

                    <a href="../vista/index.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-home fa-md mr-2" aria-hidden="true"></i>Inicio</a>
                </div>

                <hr class="mt-3">

                <div id="Navbar2" class="d-grid gap-2 col-12 mx-auto mt-5 float-none">

                    <a href="cerrar_sesion.php" class="btn  btn-lg" style="font-size: 18px;"><i class="fa fa-power-off  fa-md mr-2"></i>Cerrar sesión</a>
                </div>
            </div>

        </div>

        <div class="col-md-9 col-lg-9" style="background-color: #d4dde5; height: 70px;">
            <div id="Navbar1" class="navbar ml-5">
                <div class="ml-5">
                    <a class="navbar-brand nav-link mt-1 ml-5 float-left" href="../vista/nuevo_ciudad.php">Nuevo</a>
                    <a class="navbar-brand nav-link mt-1 ml-4" href="../vista/list_ciudades.php">Lista</a>
                </div>
            </div>
            <div class="encabezado container-fluid mt-5 ml-4 col-md-9 col-lg-9">
                <img src="../imagenes/logo.png" class="rounded mx-auto d-block responsive float-left " style="width: 68px; margin-top: 10px;" alt="Responsive image" />
                <div class="ml-5">
                    <div class="ml-5">

                        <h2 class="float-left ml-4 mb-3" style="font-family: Champagne;  font-size: 45px; margin-top : 10px;">Crear ciudad</h2>
                    </div>
                </div>

                <div class="container-fluid mt-1">

                    <div class=" float-left col-md-12 col-lg-12 mt-3 col-sm-12">

                        <form class="row g-3" action="registroCodeCiudad.php" method="POST">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <span class="fa fa-id-card form-control-icon"></span>
                                    <input type="number" name="txtCodigo_ciudad" class="form-control" required placeholder="Identificación" id="inputEmail4">
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">

                                <div class="form-group">
                                    <span class="fa fa-map-marker form-control-icon"></span>
                                    <input type="text" name="txtUbicacion" class="form-control" required placeholder="Ubicacion" id="Ubicacion">
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <span class="fa fa-arrow-circle-down  form-control-icon"></span>
                                    <select type="text" name="txtdepartamentos" class="form-control" required placeholder="Departamentos" id="departamentos">
                                        <option value="ANTIOQUIA">ANTIOQUIA</option>
                                        <option value="ATLANTICO">ATLANTICO</option>
                                        <option value="BOGOTA D.C">BOGOTA D.C</option>
                                        <option value="BOLIVAR">BOLIVAR</option>
                                        <option value="BOYACA">BOYACA</option>
                                        <option value="CALDAS">CALDAS</option>
                                        <option value="CAQUETA">CAQUETA</option>
                                        <option value="CAUCA">CAUCA</option>
                                        <option value="CESAR">CESAR</option>
                                        <option value="CORDOBA">CORDOBA</option>
                                        <option value="CUNDINAMARCA">CUNDINAMARCA</option>
                                        <option value="CHOCO">CHOCO</option>
                                        <option value="HUILA">HUILA</option>
                                        <option value="LA GUAJIRA">LA GUAJIRA</option>
                                        <option value="MAGDALENA">MAGDALENA</option>
                                        <option value="META">META</option>
                                        <option value="NARIÑO">NARIÑO</option>
                                        <option value="NORTE DE SANTANDER">NORTE DE SANTANDER</option>
                                        <option value="RISARALDA">RISARALDA</option>
                                        <option value="SANTANDER">SANTANDER</option>
                                        <option value="SUCRE">SUCRE</option>
                                        <option value="TOLIMA">TOLIMA</option>
                                        <option value="VALLE DEL CAUCA">VALLE DEL CAUCA</option>
                                        <option value="ARAUCA">ARAUCA</option>
                                        <option value="CASANARE">CASANARE</option>
                                        <option value="PUTUMAYO">PUTUMAYO</option>
                                        <option value="ARCHIPIELAGO DE SAN ANDRES, PROVIDENCIA Y SANTA CATALINA">ARCHIPIELAGO DE SAN ANDRES, PROVIDENCIA Y SANTA CATALINA</option>
                                        <option value="AMAZONAS">AMAZONAS</option>
                                        <option value="GAUNIA">GAUNIA</option>
                                        <option value="GUAVIARE">GUAVIARE</option>
                                        <option value="VAUPES">VAUPES</option>
                                        <option value="VICHADA">VICHADA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                            </div>
                            <div class="ustify-content-center mt-4 d-md-table mx-auto mb-4">
                                <div class="form-group">
                                    <span class="fa fa-globe  form-control-icon"></span>
                                <input type="submit" class="reg btn-lg d-flex justify-content-center d-md-table mx-auto mt-3" value="registrar">
                            </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>


<section id="pie">
    <footer class="bg-dark py-5" style="position: static;" id="pie_pagin">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="accordion d-lg-flex w-100" data-parent="accordion">

                            <div class="col-lg-4 mt-5 col-md-12">

                                <a href="#One" class="h4 text-white nav-link p-0 d-block d-lg-none d-xl-none" data-toggle="collapse" id="accordion"> Redes sociales:</a>
                                <div class="text-white h4 d-none d-lg-block d-kl-block">
                                    Redes sociales:
                                </div>
                                <div class="collapse text-white d-lg-flex" id="One" data-parent="#accordion">
                                    <ul class="list-unstyled  d-flex w-100 justify-content-between">
                                        <li><a href="https://www.facebook.com/" target="blank" class="nav-limk p-0"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/?lang=es" target="blank" class="nav-limk p-0"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="https://www.instagram.com/?hl=es-la" target="blank" class="nav-limk p-0"><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li><a href="https://www.youtube.com/?gl=CO&hl=es-419" target="blank" class="nav-limk p-0"><i class="fa fa-youtube-play"></i></a>
                                        </li>
                                        <li><a href="#" class="nav-limk p-0"><i class="fa fa-linked-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-5 col-md-12">

                                <a href="#Two" class="h4 text-white nav-link p-0 d-block d-lg-none d-xl-none" data-toggle="collapse" id="accordion">Contactenos:</a>
                                <div class="text-white h4  d-none d-lg-block d-kl-block">
                                    Contactenos:
                                </div>
                                <div class="collapse text-white d-lg-flex" id="Two" data-parent="#accordion">
                                    <div>

                                        <div>Teléfono Fijo: 2211137</div>
                                        <div>Celular: (57) 3145735928</div>
                                        <div>pereitha99@hotmail.com</div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 mt-5 col-md-12">

                                <a href="#Three" class="h4 text-white nav-link p-0 d-block d-lg-none d-xl-none" data-toggle="collapse" id="accordion"> Estamos ubicados:</a>
                                <div class="text-white h4 d-none d-lg-block d-kl-block">
                                    Estamos ubicados:
                                </div>
                                <div class="collapse text-white d-lg-flex" id="Three" data-parent="#accordion">
                                    <div>

                                        <div>Carrera 2 Nro 55g -31</div>
                                        <div>Caicedo villa-turbay.</div>
                                        <div>Medellín - Antioquia - Colombia</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="container-fluid">
        <div class="row bg-danger">
            <div class="col-md-12">
                <div class="d-flex justify-content-center align-items-center">
                    <span class="p-4 text-white">&copy; Cardinal Weight Colombia 2020</span>
                </div>
            </div>
        </div>

    </div>

    <script src="../jquery/jquery-3.4.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../popper/popper.min.js"></script>

    <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../js/codigo.js"></script>
</body>

</html>