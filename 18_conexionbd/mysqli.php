<?php
$host = "localhost"; //o la IP del servidor
$usuario = "root"; // usuario MYsql
$contrasena = ""; // contraseña de MYsql
$base_datos = "gestion_empleados"; // nombre de la base de datos

// crear conexion
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);
// verificar conexion
if ($conn->connect_error) {
    die("Conexion fallida: " . $conn->connect_error);
}
echo "Conexion exitosa a la base de datos";
