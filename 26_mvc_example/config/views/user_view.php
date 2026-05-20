<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-body-tertiary">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">
        <div class="container-fluid">

            <a class="navbar-brand fw-bold" href="#">
                <i class="bi bi-mortarboard-fill"></i>
                Sistema de Alumnos
            </a>

        </div>
    </nav>

    <!-- Contenedor -->
    <div class="container py-5">

        <!-- Card principal -->
        <div class="card border-0 shadow-lg rounded-4">

            <!-- Header -->
            <div class="card-header bg-primary text-white py-4 rounded-top-4">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <div>
                        <h2 class="fw-bold mb-1">
                            <i class="bi bi-people-fill"></i>
                            Lista de Alumnos
                        </h2>

                        <p class="mb-0 opacity-75">
                            Gestión de alumnos matriculados
                        </p>
                    </div>

                    <div>
                        <a href="#" class="btn btn-light fw-semibold shadow-sm">
                            <i class="bi bi-person-plus-fill"></i>
                            Nuevo Alumno
                        </a>
                    </div>

                </div>

            </div>

            <!-- Body -->
            <div class="card-body p-4">

                <?php if (!empty($users)): ?>

                    <!-- Buscador -->
                    <div class="row mb-4">

                        <div class="col-md-4">

                            <div class="input-group shadow-sm">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text"
                                    class="form-control"
                                    placeholder="Buscar alumno...">

                            </div>

                        </div>

                    </div>

                    <!-- Tabla -->
                    <div class="table-responsive">

                        <table class="table table-hover align-middle table-bordered">

                            <thead class="table-primary text-center">

                                <tr>
                                    <th>#</th>
                                    <th>DNI</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Carrera</th>
                                    <th>Curso</th>
                                    <th>Ciclo</th>
                                    <th>Promedio</th>
                                    <th>Acciones</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($users as $index => $user): ?>

                                    <tr>

                                        <td class="text-center fw-bold">
                                            <?= $index + 1 ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-dark fs-6">
                                                <?= htmlspecialchars($user['dni']) ?>
                                            </span>
                                        </td>

                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($user['nombres']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($user['apellidos']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($user['direccion']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($user['telefono']) ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-primary">
                                                <?= htmlspecialchars($user['nombrecarrera']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($user['nombrecurso']) ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-secondary">
                                                <?= htmlspecialchars($user['nombreciclo']) ?>
                                            </span>
                                        </td>

                                        <td class="text-center">

                                            <?php if ($user['promedio'] >= 14): ?>

                                                <span class="badge bg-success fs-6">
                                                    <?= htmlspecialchars($user['promedio']) ?>
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-danger fs-6">
                                                    <?= htmlspecialchars($user['promedio']) ?>
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <!-- Acciones -->
                                        <td class="text-center">

                                            <div class="d-flex gap-2 justify-content-center">

                                                <a href="index.php?action=edit&id=<?= $user['idalumno'] ?>"
                                                    class="btn btn-warning btn-sm shadow-sm">

                                                    <i class="bi bi-pencil-square"></i>
                                                    Editar

                                                </a>

                                                <a href="index.php?action=delete&id=<?= $user['idalumno'] ?>"
                                                    class="btn btn-danger btn-sm shadow-sm"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este alumno?')">

                                                    <i class="bi bi-trash-fill"></i>
                                                    Eliminar

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                <?php else: ?>

                    <!-- Sin registros -->
                    <div class="alert alert-info text-center shadow-sm">

                        <h4 class="mb-2">
                            <i class="bi bi-info-circle-fill"></i>
                            No hay alumnos registrados
                        </h4>

                        <p class="mb-0">
                            Agrega alumnos para comenzar.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>