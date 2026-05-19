<?php
include 'db.php';

$stmt = $pdo->query("SELECT * FROM view_alumnos");
$alumnos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Alumnos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                <h2 class="mb-0">
                    <i class="fa-solid fa-user-graduate"></i>
                    Lista de Alumnos
                </h2>

                <a href="crear.php" class="btn btn-success">

                    <i class="fa-solid fa-plus"></i>
                    Nuevo Alumno

                </a>

            </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th><i class="fa-solid fa-hashtag"></i> </th>
                    <th><i class="fa-solid fa-id-card"></i> DNI</th>
                    <th><i class="fa-solid fa-user"></i> Nombres</th>
                    <th><i class="fa-solid fa-user-tag"></i> Apellidos</th>
                    <th><i class="fa-solid fa-graduation-cap"></i> Carrera</th>
                    <th><i class="fa-solid fa-book"></i> Curso</th>
                    <th><i class="fa-solid fa-calendar"></i> Ciclo</th>
                    <th><i class="fa-solid fa-chart-line"></i> Promedio</th>
                    <th><i class="fa-solid fa-gears"></i> Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($alumnos)): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">No hay alumnos registrados.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($alumnos as $alumno): ?>
                        <tr>
                            <td><?= $alumno['idalumno'] ?></td>
                            <td><?= htmlspecialchars($alumno['dni']) ?></td>
                            <td><?= htmlspecialchars($alumno['nombres']) ?></td>
                            <td><?= htmlspecialchars($alumno['apellidos']) ?></td>
                            <td><?= htmlspecialchars($alumno['nombrecarrera']) ?></td>
                            <td><?= htmlspecialchars($alumno['nombrecurso']) ?></td>
                            <td><?= htmlspecialchars($alumno['nombreciclo']) ?></td>
                            <td><?= number_format($alumno['promedio'], 2) ?></td>
                                                    <td>
                            <a href="edit.php?id=<?= $alumno['idalumno'] ?>"
                            class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Editar
                            </a>
                            <a href="eliminar.php?id=<?= $alumno['idalumno'] ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar este alumno?')">
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
