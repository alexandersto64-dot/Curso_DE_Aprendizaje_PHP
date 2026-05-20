<?php
require_once 'app/core/Database.php';

class HomeController
{
    public function index()
    {
        $db = new Database();
        $resultado = $db->connect();

        if ($resultado instanceof mysqli) {
            $mensaje = "Conexión exitosa a la base de datos.";
            $resultado->close(); //Cerrar conexion
        } else {
            $mensaje = "Error al conectar a la base de datos. $resultado";
        }
        require_once 'app/view/home.php';
    }
}
