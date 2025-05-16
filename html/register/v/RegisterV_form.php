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

    <!-- reCATCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


    <!-- animaciones  -->
    <style>
        body {
            /* padding-top: 60px; */
            /* Ajusta este valor según la altura de tu navbar */
            width: 100vw;
            height: 100vh;

        }

        body {
            background: linear-gradient(90deg, rgba(140, 46, 46, 1) 0%, rgba(199, 87, 94, 1) 79%, rgba(153, 146, 83, 1) 100%);
        }

        @keyframes wipe-in-right {
            from {
                clip-path: inset(0 100% 0 0);
            }

            to {
                clip-path: inset(0 0 0 0);
            }
        }

        [transition-style="in:wipe:right"] {
            animation: 2.5s cubic-bezier(.25, 1, .30, 1) wipe-in-right both;
        }

        #registroform {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            animation: 2.5s cubic-bezier(.25, 1, .30, 1) wipe-in-right both;
        }
    </style>
    <!-- Funcionalidad -->
    <script>
        function inicio_session() {
            location.href = "index.php?accion=formulario_login"
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
                                <h1 style="color: aliceblue;">Registrate</h1>
                            </div>
                        </div>
                    </div>

                    <form action="index.php?accion=registro" method="post" id="registroform" name="registroform">

                        <div class="container text-center">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Nombre(s)" aria-label="Nombre(s)" id="nombres" name="nombres">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                    <input type="text" class="form-control" placeholder="Apellido Paterno" aria-label="Apellido Paterno" id="apellido_paterno" name="apellido_paterno">
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                                    <input type="text" class="form-control" placeholder="Apellido Materno" aria-label="Apellido Materno" id="apellido_materno" name="apellido_materno">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Correo: ejemplo@ejemplo.com" aria-label="Correo: ejemplo@ejemplo.com" id="mail" name="mail">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">

                                    <input type="text" class="form-control" placeholder="Nombre de Usuario" aria-label="Nombre de Usuario" id="nombre_usuario" name="nombre_usuario" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña" id="contrasena" name="contrasena" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <input type="password" class="form-control" placeholder="Confirmar contraseña" aria-label="Confirmar contraseña" id="contrasena_confirm" name="contrasena_confirm" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col">
                                    <div class="g-recaptcha" data-sitekey="6LeA6jsrAAAAAOeLlO1-Uj7PPps12JQwhw08pfy5"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">

                                </div>

                                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-4">
                                    <div class="d-grid gap-2">
                                        <button type="button" class="btn btn-primary" onclick="inicio_session()" id="login" name="login">Iniciar Sesión</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>

                <!-- <button type="submit">Registrar</button> -->
                <div class="col-sm-1 col-md-1 col-lg-3">

                </div>
            </div>

            <!-- alertas -->
            <?php if (isset($error)) { ?>
                <script>
                    Swal.fire({
                        title: "Error!",
                        text: <?php echo json_encode($error); ?>,
                        icon: <?php echo json_encode($logo); ?>
                    });

                    let nombres = document.getElementById("nombres");
                    let apellido_paterno = document.getElementById("apellido_paterno");
                    let apellido_materno = document.getElementById("apellido_materno");

                    nombres.value = <?php echo json_encode($_POST['nombres']); ?>;
                    apellido_paterno.value = <?php echo json_encode($_POST['apellido_paterno']); ?>;
                    apellido_materno.value = <?php echo json_encode($_POST['apellido_materno']); ?>;
                </script>
            <?php } ?>

            <?php if (isset($validado)) { ?>
                <script>
                    Swal.fire({
                        title: "Registro Exitoso",
                        text: <?php echo json_encode($validado); ?>,
                        icon: "success",
                        didClose: () => {
                            window.location.href = "configuracion.php";
                        }
                    });
                </script>
            <?php } ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let formulario = document.getElementById("registroform");
                    formulario.style.opacity = "1";
                });
            </script>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->


    <script
        src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>