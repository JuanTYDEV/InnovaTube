<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/galeria/m/galeriaM.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/conexion/lib.database.php';
class galeriacontroller
{

    private $modeloGaleriaR;

    public function __construct()
    {
        $db = new database();
        $con = $db->conectar();
        $this->modeloGaleriaR = new favoritosR($con);
    }

    public function seleccionfavorito()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $img = $_POST['img'];
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["desc"];
            $url = $_POST["url"];
            $nombreUsuario = $_SESSION["nombre_usuario"];

            $busqueda = $_POST["busqueda"];

            $respusta = $this->modeloGaleriaR->registrarfavorito($img, $titulo, $descripcion, $url, $nombreUsuario);

            if ($respusta) {
                $titulo_error='Agregado a favoritos';
                $error = 'El video se agrego a favoritos.';
                $logo = "success";
                require $_SERVER['DOCUMENT_ROOT'] . '/galeria/v/galeriaV_form.php'; // Mostrar el formulario con el error
            } else {
                $titulo_error='Error';
                $error = 'Ocurrio un error intentelo de nuevo mas tarde.';
                $logo = "warning";
                require $_SERVER['DOCUMENT_ROOT'] . '/galeria/v/galeriaV_form.php'; // Mostrar el formulario con el error
            }
        } else {
            // Si no es una petición POST, mostrar el formulario de inicio de sesión
            require $_SERVER['DOCUMENT_ROOT'] . '/register/v/galeriaV_form.php';
        }
    }

    public function mostrarformularioGaleria()
    {
        require $_SERVER['DOCUMENT_ROOT'] . '/galeria/v/galeriaV_form.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: http://proyectosservers.duckdns.org/index.php');
        exit;
    }
}
$galeriaController = new galeriacontroller();
