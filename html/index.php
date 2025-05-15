<?php

//login
require_once 'login/c/loginC.php';
require_once 'login/m/loginM.php';

//registro
require_once 'register/c/RegisterC.php';
require_once 'register/m/RegisterM.php';

// Inicializar la sesión (si aún no está iniciada)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Crear una instancia del controlador de inicio de sesión
$loginController = new LoginController();
$registerController = new RegisterController();

// Manejar las acciones basadas en el parámetro 'accion' en la URL
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'formulario_login':
            $loginController->mostrarFormulario();
            break;
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

        //casos para el registro de usuario
        case 'registroU':
            $registerController->mostrarFormulario();
            break;
        case 'registro':
            $registerController->registrar_Usuario();

            /* default:
            $loginController->mostrarFormulario(); // Mostrar el formulario por defecto
            break; */
    }
} else {
    $loginController->mostrarFormulario(); // Mostrar el formulario si no hay acción especificada
}
