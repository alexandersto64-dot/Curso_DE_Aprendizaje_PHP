<?php
class Database
{
    private $host = "localhost"; // localhost o la dirección IP del servidor de base de datos
    private $dbname = "empresa_servicios"; //mi base de datos se llama rrhh
    private $user = "root"; // prueba con root, pero en producción se recomienda usar un usuario específico con permisos limitados
    private $pass = ""; // prueba vacío
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            return ("Error de conexión: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
