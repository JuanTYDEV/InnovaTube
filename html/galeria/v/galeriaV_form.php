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
                    <a class="navbar-brand">Navbar</a>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <form action="#" method="">
                        <button type="button" class="btn btn-outline-success" onclick="cerrarsession()">Cerrar session</button>
                    </form>
                </div>
            </nav>
        </header>
        <main>

            <div class="container text-center">
                <div class="row align-items-start">
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <?php echo $_SESSION['nombre_usuario'] ?>
                    </div>
                    <div class="col-4">
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
<?php
}
?>