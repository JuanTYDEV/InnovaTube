<?php

require_once 'login/c/loginC.php';
require_once 'login/m/loginM.php';
// require_once 'models/Usuario.php';

// Inicializar la sesión (si aún no está iniciada)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Crear una instancia del modelo de usuario (la conexión PDO ya está en Usuario.php)
global $pdo; // Hacer la conexión PDO accesible aquí si es necesario
$usuarioModel = new Usuario($pdo);

// Crear una instancia del controlador de inicio de sesión
$loginController = new LoginController();

// Manejar las acciones basadas en el parámetro 'accion' en la URL
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'login':
            $loginController->iniciarSesion();
            break;
        case 'success':
            $loginController->mostrarExito();
            break;
        case 'error':
            $loginController->mostrarError();
            break;
        case 'dashboard':
            $loginController->dashboard();
            break;
        case 'logout':
            $loginController->logout();
            break;
        default:
            $loginController->mostrarFormulario(); // Mostrar el formulario por defecto
            break;
    }
} else {
    $loginController->mostrarFormulario(); // Mostrar el formulario si no hay acción especificada
}

?>