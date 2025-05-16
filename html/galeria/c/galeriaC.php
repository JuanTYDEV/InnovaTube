<?php
class galeriacontroller
{

    private $modeloGaleria;

    public function __construct() {}

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
