<?php

class UsuarioR
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function buscarPorNombreUsuario($nombreUsuario, $correoElegido)
    {
        $stmt = $this->con->prepare("SELECT id, nombre_Usuario, correo FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }

        $stmt->bind_param("ss", $nombreUsuario, $correoElegido);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }


    public function verificaElementos($elementoIngresado, $elemntoAlmacenada = null)
    {
        // return password_verify($contrasenaIngresada, $contrasenaHashAlmacenada);
        if ($elementoIngresado == $elemntoAlmacenada) {
            return true;
        } else {
            return false;
        }
    }
    //Validacion de contraseñas iguales y codificacion para elemento hash (codificacion aun no realizada)
    public function confirmacionContraseña($contrasenaIngresada, $contrasenaVerificar)
    {
        // return password_verify($contrasenaIngresada, $contrasenaHashAlmacenada);
        if ($contrasenaIngresada == $contrasenaVerificar) {
            return true;
        } else {
            return false;
        }
    }

    public function registroNuevoUsuario($nombres, $apellido_paterno, $apellido_materno, $correo, $nombreNuevoUsuario, $contrasena)
    {
        //registro de usuario
        $stmt = $this->con->prepare("INSERT INTO `usuarios` (`id`, `nombres`, `apellido_P`, `apellido_M`, `nombre_Usuario`, `correo`, `pass`, `registro`) VALUES (NULL, ?, ?, ?, ?, ?, ?, current_timestamp());");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }
        $stmt->bind_param("ssssss", $nombres, $apellido_paterno, $apellido_materno, $nombreNuevoUsuario, $correo, $contrasena);
        $stmt->execute();


        //inicio de sesion del nuevo usuario 
        $stmt = $this->con->prepare("SELECT id, nombre_Usuario, correo FROM usuarios WHERE nombre_Usuario = ? OR correo = ?");
        if (!$stmt) {
            throw new RuntimeException("Error al preparar la consulta: " . $this->con->error);
        }

        $stmt->bind_param("ss", $nombreNuevoUsuario, $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}
