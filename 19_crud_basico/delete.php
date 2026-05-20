<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Eliminar empleado
    $stmt = $pdo->prepare("DELETE FROM empleado WHERE idempleado = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
    exit();
}
