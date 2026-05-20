<?php
class Database
{
    private $host = "localhost";
    private $dbname = "empresa_servicios";
    private $user = "root";
    private $pass = "";

    public $conn;

    public function connect()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}
