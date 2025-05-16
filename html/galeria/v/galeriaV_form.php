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
                    <a class="navbar-brand"><?php echo $_SESSION['nombre_usuario'] ?></a>
                    <form class="d-flex" acrole="search" action="#">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="textoBuscar" name="textoBuscar" onsubmit="buscarVideos()" />
                        <button class="btn btn-outline-success" type="button" onclick="buscarVideos()">buscar</button>
                    </form>
                    <form action="#" method="">
                        <button type="button" class="btn btn-outline-success" onclick="cerrarsession()">Cerrar session</button>
                    </form>
                </div>
            </nav>
        </header>
        <main>

            <div class="container text-center">
                <div class="row">
                    <div class="col-5 text-end">Mostrar:</div>
                    <div class="col-2">
                        <select class="form-select" aria-label="Default select example" onchange="buscarVideos()" id="cantidadV" name="cantidadV">
                            <option selected value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-5"></div>
                </div>
                <div id="videosCarga"></div>
            </div>

        </main>
        <footer>
            <!-- place footer here -->
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="galeria/m/galeriaM.js"></script>

    </body>

    </html>
<?php
}
?>