<?php
include 'db.php';

// Obtener cargos
$stmt_cargo = $pdo->query("SELECT * FROM cargo");
$cargos = $stmt_cargo->fetchAll();

// Leer empleados
$stmt_empleado = $pdo->query("
    SELECT e.*, c.nombrecargo 
    FROM empleado e 
    LEFT JOIN cargo c ON e.cargo_id = c.id
");

$empleados = $stmt_empleado->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #dfe9f3, #ffffff);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
        }

        .titulo {
            font-weight: bold;
            color: #0d6efd;
        }

        .table thead {
            background: #0d6efd;
            color: white;
        }

        .btn {
            border-radius: 10px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f5ff;
            transition: 0.3s;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <!-- Título -->
        <div class="text-center mb-4">
            <h1 class="titulo">
                <i class="fa-solid fa-users"></i>
                Sistema de Gestión de Empleados
            </h1>
            <p class="text-muted">
                Registro y administración de empleados
            </p>
        </div>

        <!-- Formulario -->
        <div class="card p-4 mb-5">
            <h3 class="mb-4 text-primary">
                <i class="fa-solid fa-user-plus"></i>
                Registrar Empleado
            </h3>

            <form action="process.php" method="POST">

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-id-card"></i>
                            DNI
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="dni"
                            maxlength="8"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-user"></i>
                            Nombres
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="nombres"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-user-tag"></i>
                            Apellidos
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="apellidos"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-location-dot"></i>
                            Dirección
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="direccion"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-phone"></i>
                            Teléfono
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="telefono"
                            maxlength="9"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            <i class="fa-solid fa-briefcase"></i>
                            Cargo
                        </label>

                        <select class="form-select" name="cargo_id" required>

                            <option value="">
                                Seleccionar Cargo
                            </option>

                            <?php foreach ($cargos as $cargo): ?>

                                <option value="<?= $cargo['id'] ?>">
                                    <?= $cargo['nombrecargo'] ?>
                                </option>

                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar Empleado
                        </button>

                        <button type="reset" class="btn btn-secondary px-4">
                            <i class="fa-solid fa-eraser"></i>
                            Limpiar
                        </button>
                    </div>

                </div>
            </form>
        </div>

        <!-- Tabla -->
        <div class="card p-4">

            <h3 class="mb-4 text-primary">
                <i class="fa-solid fa-address-book"></i>
                Lista de Empleados
            </h3>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle text-center">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if (!empty($empleados)): ?>

                            <?php foreach ($empleados as $empleado): ?>

                                <tr>

                                    <td><?= $empleado['idempleado'] ?></td>
                                    <td><?= $empleado['dni'] ?></td>
                                    <td><?= $empleado['nombres'] ?></td>
                                    <td><?= $empleado['apellidos'] ?></td>
                                    <td><?= $empleado['direccion'] ?></td>
                                    <td><?= $empleado['telefono'] ?></td>
                                    <td><?= $empleado['nombrecargo'] ?></td>

                                    <td>

                                        <a
                                            href="edit.php?id=<?= $empleado['idempleado'] ?>"
                                            class="btn btn-warning btn-sm">

                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Editar
                                        </a>

                                        <a
                                            href="delete.php?id=<?= $empleado['idempleado'] ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Deseas eliminar este empleado?')">

                                            <i class="fa-solid fa-trash"></i>
                                            Eliminar
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    No hay empleados registrados
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>