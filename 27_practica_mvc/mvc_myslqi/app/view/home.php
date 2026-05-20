<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Servicios</title>

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
                <i class="bi bi-tools"></i>
                Sistema de Servicios
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
                            <i class="bi bi-clipboard-data-fill"></i>
                            Lista de Servicios
                        </h2>

                        <p class="mb-0 opacity-75">
                            Gestión de servicios técnicos
                        </p>

                    </div>

                    <div>

                        <a href="#" class="btn btn-light fw-semibold shadow-sm">

                            <i class="bi bi-plus-circle-fill"></i>
                            Nuevo Servicio

                        </a>

                    </div>

                </div>

            </div>

            <!-- Body -->
            <div class="card-body p-4">

                <?php if (!empty($servicios)): ?>

                    <!-- Buscador -->
                    <div class="row mb-4">

                        <div class="col-md-4">

                            <div class="input-group shadow-sm">

                                <span class="input-group-text bg-white">
                                    <i class="bi bi-search"></i>
                                </span>

                                <input type="text"
                                    class="form-control"
                                    placeholder="Buscar servicio...">

                            </div>

                        </div>

                    </div>

                    <!-- Tabla -->
                    <div class="table-responsive">

                        <table class="table table-hover align-middle table-bordered">

                            <thead class="table-primary text-center">

                                <tr>

                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Servicio</th>
                                    <th>Técnico</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Fecha</th>
                                    <th>Costo</th>
                                    <th>Acciones</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($servicios as $index => $servicio): ?>

                                    <tr>

                                        <td class="text-center fw-bold">
                                            <?= $index + 1 ?>
                                        </td>

                                        <td class="fw-semibold">
                                            <?= htmlspecialchars($servicio['cliente']) ?>
                                        </td>

                                        <td>

                                            <span class="badge bg-primary fs-6">

                                                <?= htmlspecialchars($servicio['servicio']) ?>

                                            </span>

                                        </td>

                                        <td>
                                            <?= htmlspecialchars($servicio['tecnico']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($servicio['telefono']) ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($servicio['direccion']) ?>
                                        </td>

                                        <td class="text-center">

                                            <span class="badge bg-secondary">

                                                <?= htmlspecialchars($servicio['fecha_servicio']) ?>

                                            </span>

                                        </td>

                                        <td class="text-center">

                                            <span class="badge bg-success fs-6">

                                                S/ <?= htmlspecialchars($servicio['costo']) ?>

                                            </span>

                                        </td>

                                        <!-- Acciones -->
                                        <td class="text-center">

                                            <div class="d-flex gap-2 justify-content-center">

                                                <!-- EDITAR -->
                                                <a href="index.php?action=edit&id=<?= $servicio['id'] ?>"
                                                    class="btn btn-warning btn-sm shadow-sm"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Editar">

                                                    <i class="bi bi-pencil-square"></i>

                                                </a>

                                                <!-- ELIMINAR -->
                                                <a href="index.php?action=delete&id=<?= $servicio['id'] ?>"
                                                    class="btn btn-danger btn-sm shadow-sm"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"
                                                    title="Eliminar"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este servicio?')">

                                                    <i class="bi bi-trash-fill"></i>

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
                            No hay servicios registrados

                        </h4>

                        <p class="mb-0">
                            Agrega servicios para comenzar.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));
    </script>
</body>

</html>