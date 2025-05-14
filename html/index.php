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
    <style>
        body {
            padding-top: 60px;
            /* Ajusta este valor según la altura de tu navbar */
        }
    </style>
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">InnovaTuve</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>


        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    One of three columns
                </div>
                <div class="col">
                    <h1 class="text-center">Hola Mundo</h1>
                </div>
                <div class="col" id="holiwis">
                    <?php
                    for ($i = 0; $i < 10; $i++) {
                        echo ($i);
                    }
                    ?>
                </div>
            </div>
        </div>
        <script>
            elemtent = document.getElementById("holiwis");

            function prueba() {
                elemtent.classList.toggle("d-none");
            }
        </script>

        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <input type="button" onclick="prueba()" value="Presiona para remover">
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <?php
                    $servername = $_ENV['DATABASE_HOST']; // Esto será 'db'
                    $username = $_ENV['DATABASE_USER'];   // 'inovajuan'
                    $password = $_ENV['DATABASE_PASSWORD']; // 'inovajuan1234'
                    $dbname = $_ENV['DATABASE_NAME'];     // 'pruebaTube'

                    // Crear conexión
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }
                    echo "<h1>Conexión exitosa a la base de datos 'pruebaTube' con el usuario 'inovajuan'!</h1>";

                    $conn->close();
                    ?>
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