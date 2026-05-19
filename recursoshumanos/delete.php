<?php
include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Primero eliminar asistencias del empleado
    $pdo->prepare("DELETE FROM asistencia WHERE empleado_id = ?")->execute([$id]);

    // Luego eliminar empleado
    $pdo->prepare("DELETE FROM empleado WHERE idempleado = ?")->execute([$id]);

    header("Location: index.php");
    exit();
}