<?php
include 'db.php';

$empleados = $pdo->query("SELECT * FROM view_empleados")->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow p-4">

            <!-- TITULO -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="mb-0">

                    <i class="fa-solid fa-users"></i>
                    Lista de Empleados

                </h2>

                <a href="process.php" class="btn btn-success">

                    <i class="fa-solid fa-user-plus"></i>
                    Nuevo Empleado

                </a>

            </div>

            <!-- TABLA -->
            <table class="table table-bordered table-hover" style="width: 100%;">

                <thead class="table-dark">

                    <tr>

                        <th>
                            <i class="fa-solid fa-hashtag"></i>

                        </th>

                        <th>
                            <i class="fa-solid fa-id-card"></i>
                            DNI
                        </th>

                        <th>
                            <i class="fa-solid fa-user"></i>
                            Nombres
                        </th>

                        <th>
                            <i class="fa-solid fa-user-tag"></i>
                            Apellidos
                        </th>

                        <th>
                            <i class="fa-solid fa-phone"></i>
                            Teléfono
                        </th>

                        <th>
                            <i class="fa-solid fa-briefcase"></i>
                            Cargo
                        </th>

                        <th>
                            <i class="fa-solid fa-money-bill-wave"></i>
                            Sueldo
                        </th>

                        <th>
                            <i class="fa-solid fa-building"></i>
                            Departamento
                        </th>

                        <th>
                            <i class="fa-solid fa-gears"></i>
                            Acciones
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($empleados)): ?>

                        <tr>

                            <td colspan="9" class="text-center text-muted">

                                <i class="fa-solid fa-circle-info"></i>
                                No hay empleados registrados.

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($empleados as $e): ?>

                            <tr>

                                <td><?= $e['idempleado'] ?></td>

                                <td><?= htmlspecialchars($e['dni']) ?></td>

                                <td><?= htmlspecialchars($e['nombres']) ?></td>

                                <td><?= htmlspecialchars($e['apellidos']) ?></td>

                                <td><?= htmlspecialchars($e['telefono']) ?></td>

                                <td><?= htmlspecialchars($e['nombrecargo']) ?></td>

                                <td>

                                    <i class="fa-solid fa-sack-dollar text-success"></i>

                                    S/. <?= number_format($e['sueldo'], 2) ?>

                                </td>

                                <td><?= htmlspecialchars($e['nombredepartamento']) ?></td>

                                <td>

                                    <!-- EDITAR -->
                                    <a
                                        href="edit.php?id=<?= $e['idempleado'] ?>"
                                        class="btn btn-warning btn-sm">

                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar

                                    </a>

                                    <!-- ELIMINAR -->
                                    <a
                                        href="delete.php?id=<?= $e['idempleado'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Eliminar este empleado?')">

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