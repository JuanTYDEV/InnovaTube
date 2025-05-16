<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: index.php');
    exit;
} else {
    require_once 'galeria/c/galeriaC.php';

    $galeryController = new galeriacontroller();

    if (isset($_GET['accion'])) {
        $accion = $_GET['accion'];
        switch ($accion) {

            case 'logout':
                $galeryController->logout();
                break;

            case 'favoritoA':
                $galeryController->seleccionfavorito();
                break;
        }
    } else {
        $galeryController->mostrarformularioGaleria(); // Mostrar el formulario si no hay acción especificada
    }
}
