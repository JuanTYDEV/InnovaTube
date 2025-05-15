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

    <!-- Animaciones y estilis -->
    <style>
        body {
            padding-top: 60px;
            /* Ajusta este valor según la altura de tu navbar */
        }
    </style>

    <!-- Funcionalidad -->
    <script>
        function registro_usuario() {
            location.href = "index.php?accion=registroU"
        }
    </script>
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
                        <button type="button" onclick="registro_usuario()">Registrate</button>
                    </form>
                </div>
                <div class="col-4">
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
                title: "Error!",
                text: <?php echo json_encode($error); ?>,
                icon: <?php echo json_encode($logo); ?>
            });
        </script>
    <?php } ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>