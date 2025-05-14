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
    </header>
    <main>

        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col-4">

                </div>
                <div class="col-4">
                    <h1>Iniciar Sesión</h1>
                    <?php if (isset($error)): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <form action="index.php?accion=login" method="post">
                        <div>
                            <label for="nombre_usuario">Nombre de Usuario:</label>
                            <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                        </div>
                        <div>
                            <label for="contrasena">Contraseña:</label>
                            <input type="password" id="contrasena" name="contrasena" required>
                        </div>
                        <button type="submit">Iniciar Sesión</button>
                    </form>
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