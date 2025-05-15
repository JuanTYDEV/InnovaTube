<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: index.php');
    exit;
} else {
    echo "Bienvenido " . $_SESSION['nombre_usuario'];
}
