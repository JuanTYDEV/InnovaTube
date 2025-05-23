<?php
class Usuario
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function buscarPorNombreUsuario($nombreUsuario, $correoUsuario)
    {
        $stmt = $this->con->prepare("SELECT id, nombre_Usuario, pass FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }

        $stmt->bind_param("ss", $nombreUsuario, $correoUsuario);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }


    public function verificarContrasena($contrasenaIngresada, $contrasenaHashAlmacenada)
    {
        // return password_verify($contrasenaIngresada, $contrasenaHashAlmacenada);
        if ($contrasenaIngresada == $contrasenaHashAlmacenada) {
            return true;
        } else {
            return false;
        }
    }
}
