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


            $respusta = $this->modeloGaleriaR->registrarfavorito($img, $titulo, $descripcion, $url, $nombreUsuario);

            if ($respusta) {
                echo '<script>
                        Swal.fire({
                        title: "Agregado a favoritos",
                        text: "El video se agrego a favoritos",
                        icon: "success"
                        });
                    </script>';
            } else {
                echo '<script>
                        Swal.fire({
                        title: "Error!",
                        text: "Ocurrio un error intentalo de nuevo!!",
                        icon: "error"
                        });
                    </script>';
            }
        } else {
            // Si no es una petición POST, mostrar el formulario de inicio de sesión
            require $_SERVER['DOCUMENT_ROOT'] . '/register/v/RegisterV_form.php';
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
