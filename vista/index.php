<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metrolegal</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">




</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">

        <a class="navbar-brand" href="index.php">
            <img src="../imagenes/cardinal.png" width="120" height="40" alt="40">
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a id="a_metrolegal" class="navbar-brand text-white"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item active">
                    <a id="a_login" class="nav-link text-white" href="logueo.php">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a id="a_registro" class="nav-link text-white" href="registro.php">Registro</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="section-1">

        <div class="container text-center ">
            <div class="row">

                <div class="col-md-6">
                    <div class="pray">
                        <img src="../imagenes/indicador.png" alt="pray">
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="panel text-left  bg-danger">


                        <h1 class="text-center"> Cardinal Weight Colombia</h1>
                        <p class="pt">
                            Somos expertos en la fabricaci??n, montaje, mantenimiento y calibraci??n de sistemas

                            de pesaje electr??nicos y electromec??nicos; ofrecemos sistemas de control para automatizaci??n de procesos industriales. La calidad y precisi??n de los productos de tecnolog??a Cardinal se encuentran alrededor del mundo.
                        </p>

                        <p>
                            Soluciones integrales con las mejores tecnolog??as de sistemas de pesaje, b??sculas, balanzas, indicadores de peso y celdas de carga entre diversas opciones y referencias.

                            La tecnolog??a Norteamericana de nuestros equipos incluyen certificados de conformidad de f??brica en USA. Inclusive manejamos algunos modelos con ??Garant??a de por Vida!
                        </p>

                    </div>
                </div>
                
            </div>
        </div>

    </section>

    <section id="pie">
        <footer class="bg-dark py-5 mt-5">
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

                                            <div>Tel??fono Fijo: (57) (4) 6046332</div>
                                             <div>info@cardinalscale.com.co</div>
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

                                            <div>Cra.43 A No 61 Sur 152 Bodega 131 </div>
                                            <div>Sabaneta (Ciudadela industrial sabaneta)</div>
                                            <div>Medell??n - Antioquia - Colombia</div>
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

        <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="../js/codigo.js"></script>

</body>

</html>