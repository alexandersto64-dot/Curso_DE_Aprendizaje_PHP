<?php

include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // =================================
    // ELIMINAR MATRICULA
    // =================================

    $stmtMatricula = $pdo->prepare("
        DELETE FROM matricula
        WHERE alumno_id = ?
    ");

    $stmtMatricula->execute([$id]);

    // =================================
    // ELIMINAR ALUMNO
    // =================================

    $stmtAlumno = $pdo->prepare("
        DELETE FROM alumno
        WHERE idalumno = ?
    ");

    $stmtAlumno->execute([$id]);

    header("Location: index.php");

    exit();
}
?>