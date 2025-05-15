<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/lib.database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/login/m/loginM.php';

class LoginController
{
    private $usuarioModel;

    public function __construct()
    {
        $db = new database();
        $con = $db->conectar();
        $this->usuarioModel = new Usuario($con);
    }

    public function iniciarSesion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombreUsuario = $_POST['nombre_usuario'];
            $contrasena = $_POST['contrasena'];

            $usuario = $this->usuarioModel->buscarPorNombreUsuario($nombreUsuario);


            if ($usuario && $this->usuarioModel->verificarContrasena($contrasena, $usuario['pass'])) {
                // Inicio de sesión exitoso
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nombre_usuario'] = $usuario['nombre_Usuario'];
                header('Location: configuracion.php'); // Redirigir a la página de éxito
                exit();
            } else {
                // Error de inicio de sesión
                $error = "Correo/usuario o contraña incorrecta trata de nuevo";
                $logo = "error";
                require $_SERVER['DOCUMENT_ROOT'] . '/login/v/loginV_form.php'; // Mostrar el formulario con el error
            }
        } else {
            // Si no es una petición POST, mostrar el formulario de inicio de sesión
            require $_SERVER['DOCUMENT_ROOT'] . '/login/v/loginV_form.php';
        }
    }

    public function mostrarFormulario()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/login/v/loginV_form.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php'); // Redirigir al formulario de inicio de sesión después de cerrar sesión
        exit();
    }
}

// Crear una instancia del controlador
$loginController = new LoginController();
