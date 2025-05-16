<?php

class favoritosR
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function registrarfavorito($img, $titulo, $descripcion, $url, $nombreUsuario)
    {
        //registro de favoritos
        /* $stmt = $this->con->prepare("INSERT INTO `usuarios` (`id`, `nombres`, `apellido_P`, `apellido_M`, `nombre_Usuario`, `correo`, `pass`, `registro`) VALUES (NULL, ?, ?, ?, ?, ?, ?, current_timestamp());");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }
        $stmt->bind_param("ssssss", $nombres, $apellido_paterno, $apellido_materno, $nombreNuevoUsuario, $correo, $contrasena);
        $stmt->execute(); */

        $stmt = $this->con->prepare("INSERT INTO favoritos (img, titulo, descripcion, url, nombre_Usuario) VALUES (?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }
        $stmt->bind_param("sssss", $img, $titulo, $descripcion, $url, $nombreUsuario);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        /*       $stmt = $this->con->prepare("SELECT id, nombre_Usuario, correo FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }

        $stmt->bind_param("ss", $nombreNuevoUsuario, $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc(); */
    }
}
