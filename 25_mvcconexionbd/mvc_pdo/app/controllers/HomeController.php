<?php
require_once 'app/core/Database.php';

class HomeController
{
    public function index()
    {
        $db = new Database();
        $resultado = $db->connect();

        if ($resultado instanceof PDO) {
            $mensaje = "Conexión exitosa a la base de datos.";
            $resultado = null; //Cerrar conexion
        } else {
            $mensaje = "Error al conectar a la base de datos. $resultado";
        }
        require_once 'app/view/home.php';
    }
}
