<?php
include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Primero eliminar movimientos de stock del producto
    $pdo->prepare("DELETE FROM movimiento_stock WHERE producto_id = ?")->execute([$id]);

    // Luego eliminar producto
    $pdo->prepare("DELETE FROM producto WHERE idproducto = ?")->execute([$id]);

    header("Location: index.php");
    exit();
}