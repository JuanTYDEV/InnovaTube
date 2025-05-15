<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/lib.database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/login/m/loginM.php';

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
                header('Location: index.php?accion=success'); // Redirigir a la página de éxito
                exit();
            } else {
                // Error de inicio de sesión
                $error = "Credenciales incorrectas.";
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

    public function mostrarExito()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/login/v/loginV_succes.php';
    }

    public function mostrarError()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/login/v/loginV_deni.php';
    }

    // Ejemplo de una acción que requiere autenticación
    public function dashboard()
    {
        if (isset($_SESSION['usuario_id'])) {
            echo "<h1>Panel de Usuario</h1>";
            echo "<p>Bienvenido, " . $_SESSION['nombre_usuario'] . "!</p>";
            echo "<p><a href='index.php?accion=logout'>Cerrar Sesión</a></p>";
        } else {
            header('Location: index.php'); // Redirigir al formulario de inicio de sesión si no está autenticado
            exit();
        }
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
