<?php
include $_SERVER['DOCUMENT_ROOT']."/conexion/conexion.php";

class database
{
    private $conn;
    public function __construct() {}

    public function mysqlC($mysql)
    {
        $retorno = "";
        $con = $this->conectar();
        //secho $mysql;
        $retorno = mysqli_query($con, $mysql) or die('Error: ' . mysqli_error($con));
        return $retorno;
    }

    public function mysqli_este($mysql)
    {
        $retorno = "";
        $retorno = mysqli_fetch_array($this->mysqlC($mysql));
        return $retorno;
    }

    public function primario($query, $busca)
    {
        $retorno = "";
        $con = $this->conectar();
        $tables = $this->mysqlC($query);
        $rows = mysqli_num_rows($tables);
        //for ($i = 0; $i < $rows; $i++)
        if ($rows > 0) {
            // $init = mysqli_affected_rows(mysqlC($mysql));
            // $init = mysqli_fetch_array($tables);
            while ($init = mysqli_fetch_array($tables)) {
                $retorno = $init[$busca];
            }
        }

        return $retorno;
    }
    public function conectar()
    {
        // global $servidor, $usuario1, $password, $db;
        // //echo $servidor, $usuario1, $password, $db;
        // $con = mysqli_connect($servidor, $usuario1, $password, $db);
        // Crear conexión
        global $servername, $username, $password, $dbname;
        // $conn = new mysqli($servername, $username, $password, $dbname);
        $this->conn = mysqli_connect($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Error de conexión: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
