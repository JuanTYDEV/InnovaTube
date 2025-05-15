<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/register/m/RegisterM.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/lib.database.php';

class RegisterController
{
    private $usuarioModel;

    public function __construct()
    {
        $db = new database();
        $con = $db->conectar();
        $this->usuarioModel = new UsuarioR($con);
    }

    public function registrar_Usuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];
            $contrasena_confirm = $_POST['contrasena_confirm'];
            $nombres = $_POST['nombres'];
            $apellido_paterno = $_POST['apellido_paterno'];
            $apellido_materno = $_POST['apellido_materno'];
            $correo = $_POST['mail'];

            //validadcion de capctcha
            $ip_server = $_SERVER['REMOTE_ADDR'];
            $captcha = $_POST['g-recaptcha-response'];
            $secretKey = "6LeA6jsrAAAAAGCZXNBdIFnA6JNEx_PwfGEuN7UC";

            $respuesta_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip_server");

            $atribuitos_captcha = json_decode($respuesta_captcha, TRUE);

            if (!$atribuitos_captcha['success']) {
                $error = 'El capTCHA es obligatorio.';
                $logo = "error";
                require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php'; // Mostrar el formulario con el error
            } else {

                $usuario = $this->usuarioModel->buscarPorNombreUsuario($nombreUsuario, $correo);

                if (!empty($usuario) && isset($usuario['nombre_Usuario']) && $this->usuarioModel->verificaElementos($nombreUsuario, $usuario['nombre_Usuario'])) {
                    $error = 'El nombre de usuario ya existe.';
                    $logo = "warning";
                    require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php'; // Mostrar el formulario con el error
                } elseif (!empty($usuario) && isset($usuario['correo']) && $this->usuarioModel->verificaElementos($correo, $usuario['correo'])) {
                    $error = 'El CORREO ELECTRONICO ya se encuentra registrado';
                    $logo = "warning";
                    require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php'; // Mostrar el formulario con el error
                } elseif ($this->usuarioModel->confirmacionContraseña($contrasena, $contrasena_confirm)) {

                    $validado = "felicidades por el registro";

                    $inicioSesion = $this->usuarioModel->registroNuevoUsuario($nombres, $apellido_paterno, $apellido_materno, $correo, $nombreUsuario, $contrasena);
                    $_SESSION['usuario_id'] = $inicioSesion['id'];
                    $_SESSION['nombre_usuario'] = $inicioSesion['nombre_Usuario'];
                    require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php';
                    // header('Location: index.php?accion=registroU'); // Redirigir a la página de éxito
                    exit();
                } else {
                    $error = "Las contraseñas no coinciden";
                    $logo = "error";
                    require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php'; // Mostrar el formulario con el error
                }
            }
        } else {
            // Si no es una petición POST, mostrar el formulario de inicio de sesión
            require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php';
        }
    }

    public function mostrarFormulario()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php'); // Redirigir al formulario de inicio de sesión después de cerrar sesión
        exit();
    }
}

// Crear una instancia del controlador
$loginController = new RegisterController();
