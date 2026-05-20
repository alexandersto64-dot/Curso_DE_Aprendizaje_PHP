<?php
class Database
{
    private $host = "localhost"; // localhost o la dirección IP del servidor de base de datos
    private $dbname = "gestion_empleados"; //mi base de datos se llama gestion_empleados
    private $user = "root"; // prueba con root, pero en producción se recomienda usar un usuario específico con permisos limitados
    private $pass = ""; // prueba vacío
    public $conn;

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            return "Error de conexión: " . $e->getMessage();
        }
    }
}
