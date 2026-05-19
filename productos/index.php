<?php
include 'db.php';

$productos = $pdo->query("
    SELECT * FROM view_productos
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestión de Productos</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow p-4">

            <!-- TITULO -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="mb-0">

                    <i class="fa-solid fa-box-open"></i>
                    Lista de Productos

                </h2>

                <a
                    href="process.php"
                    class="btn btn-success">

                    <i class="fa-solid fa-plus"></i>
                    Nuevo Producto

                </a>

            </div>

            <!-- TABLA -->
            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>

                        <th>

                            <i class="fa-solid fa-hashtag"></i>
                            

                        </th>

                        <th>

                            <i class="fa-solid fa-box"></i>
                            Producto

                        </th>

                        <th>

                            <i class="fa-solid fa-align-left"></i>
                            Descripción

                        </th>

                        <th>

                            <i class="fa-solid fa-money-bill-wave"></i>
                            Precio

                        </th>

                        <th>

                            <i class="fa-solid fa-warehouse"></i>
                            Stock

                        </th>

                        <th>

                            <i class="fa-solid fa-tags"></i>
                            Categoría

                        </th>

                        <th>

                            <i class="fa-solid fa-truck"></i>
                            Proveedor

                        </th>

                        <th>

                            <i class="fa-solid fa-gears"></i>
                            Acciones

                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($productos)): ?>

                        <tr>

                            <td colspan="8" class="text-center text-muted">

                                <i class="fa-solid fa-circle-info"></i>
                                No hay productos registrados.

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($productos as $p): ?>

                            <tr>

                                <td><?= $p['idproducto'] ?></td>

                                <td>

                                    <?= htmlspecialchars($p['nombreproducto']) ?>

                                </td>

                                <td>

                                    <?= htmlspecialchars($p['descripcion']) ?>

                                </td>

                                <td>

                                    <i class="fa-solid fa-sack-dollar text-success"></i>

                                    S/. <?= number_format($p['precio'], 2) ?>

                                </td>

                                <td>

                                    <?= $p['stock'] ?>

                                </td>

                                <td>

                                    <?= htmlspecialchars($p['nombrecategoria']) ?>

                                </td>

                                <td>

                                    <?= htmlspecialchars($p['nombreproveedor']) ?>

                                </td>

                                <td>

                                    <!-- EDITAR -->
                                    <a
                                        href="edit.php?id=<?= $p['idproducto'] ?>"
                                        class="btn btn-warning btn-sm">

                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar

                                    </a>

                                    <!-- ELIMINAR -->
                                    <a
                                        href="delete.php?id=<?= $p['idproducto'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar este producto?')">

                                        <i class="fa-solid fa-trash"></i>
                                        Eliminar

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>