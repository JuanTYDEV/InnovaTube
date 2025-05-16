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
            background: linear-gradient(90deg, rgba(120, 111, 72, 1) 0%, rgba(199, 87, 94, 1) 66%, rgba(140, 46, 46, 1) 100%);
        }

        @keyframes wipe-in-left {
            from {
                clip-path: inset(0 0 0 100%);
            }

            to {
                clip-path: inset(0 0 0 0);
            }
        }

        [transition-style="in:wipe:left"] {
            animation: 2.5s cubic-bezier(.25, 1, .30, 1) wipe-in-left both;
        }

        #registroform {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            animation: 2.5s cubic-bezier(.25, 1, .30, 1) wipe-in-left both;
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
                <div class="col-sm-1 col-md-1 col-lg-3">

                </div>
                <div class="col-sm-10 col-md-10 col-lg-6 col-xl-6">
                    <div class="container text-center">
                        <div class="row mb-4">
                            <div class="col">
                                <h1 style="color: aliceblue;">Inicio de Sesión</h1>
                            </div>
                        </div>
                    </div>

                    <?php if (isset($error)): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <form action="index.php?accion=login" method="post" id="registroform" name="registroform">
                        <div class="container text-center">

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Nombre de Usuario o Correo" aria-label="Nombre de Usuario o Correo" id="nombre_usuario" name="nombre_usuario" Required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" id="contrasena" name="contrasena" Required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-4">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary" onclick="registro_usuario()">Registrate</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>

                <div class="col-sm-1 col-md-1 col-lg-3">
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let formulario = document.getElementById("registroform");
            formulario.style.opacity = "1";
        });
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>