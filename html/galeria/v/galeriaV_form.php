<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: http://proyectosservers.duckdns.org/index.php');
    exit;
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>InnovaTuve</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="bootstrap/css/bootstrap.min.css"
            rel="stylesheet" />

        <!-- sweetalert2 -->
        <script src="sweetalert2-11.21.0/package/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="sweetalert2-11.21.0/package/dist/sweetalert2.min.css">


        <!-- Funcionalidad -->
        <script>
            function cerrarsession() {
                location.href = "configuracion.php?accion=logout";
            }
        </script>

    </head>

    <body>
        <header>
            <!-- place navbar here -->
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <!-- <a class="navbar-brand"><?php echo $_SESSION['nombre_usuario'] ?></a> -->

                    <form class="d-flex" acrole="search" action="#" method="">
                        <input class="form-control form-control-sm me-2" type="search" placeholder="Search" aria-label="Search" id="textoBuscar" name="textoBuscar"
                            onkeydown=" if (event.keyCode == 13) { event.preventDefault(); buscarVideos();}" />
                        <button class="btn btn-outline-success" type="button" onclick="buscarVideos()">buscar</button>
                    </form>

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php echo $_SESSION['nombre_usuario'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Configuracion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="cerrarsession()">Cerrar session</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <form class="d-flex">
                        <button type="button" class="btn btn-outline-success me-2" onclick="cerrarsession()">Configuracion</button>

                        <button type="button" class="btn btn-outline-success me-2" onclick="cerrarsession()">Cerrar session</button>
                    </form> -->

                </div>
            </nav>
        </header>
        <main>

            <div class="container text-center">
                <br>
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-7 col-xl-7 text-end"><label for="cantidadV">Mostrar:</label></div>
                    <div class="col-6 col-sm-5 col-md-5 col-lg-2 col-xl-2">

                        <select class="form-select mb-2" aria-label="Default select example" onchange="buscarVideos()" id="cantidadV" name="cantidadV">
                            <option selected value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-3 col-xl-3"></div>
                </div>
                <div id="videosCarga">
                    <div class="row align-items-start">
                        <div class="col-sm-1 col-md-1 col-lg-3"></div>
                        <div class="col-sm-10 col-md-10 col-lg-6 col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Busca un Video</h5>
                                    <p class="card-text">Escribe algo en el buscador para buscar videos relacionados </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-1 col-lg-3"></div>
                    </div>
                </div>
            </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>

        <!-- alertas -->

        <?php if (isset($error)) { ?>
            <script>
                Swal.fire({
                    title: <?php echo json_encode($titulo_error); ?>,
                    text: <?php echo json_encode($error); ?>,
                    icon: <?php echo json_encode($logo); ?>,
                    didClose: () => {
                        let nombres = document.getElementById("textoBuscar");

                        nombres.value = <?php echo json_encode($_POST['busqueda']); ?>;

                        const enterEvent = new KeyboardEvent('keydown', {
                            key: 'Enter',
                            keyCode: 13,
                        });
                        nombres.dispatchEvent(enterEvent);
                    }
                });
            </script>
        <?php } ?>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Funciones -->
        <script src="galeria/m/galeriaM.js"></script>

    </body>

    </html>
<?php
}
?>