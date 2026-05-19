<?php
include 'db.php';

// Obtener cargos
$stmt_cargo = $pdo->query("SELECT * FROM cargo");
$cargos = $stmt_cargo->fetchAll();

// Leer empleados
$stmt_empleado = $pdo->query("SELECT e.*, c.nombrecargo FROM empleado e LEFT JOIN cargo c ON e.cargo_id = c.id");

$empleados = $stmt_empleado->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            padding: 30px;
        }

        .form-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .table-container {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #2c3e50;
        }

        .btn i {
            margin-right: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4"><i class="fa-solid fa-users"></i> Gestión de Empleados</h2>

        <!-- Formulario -->
        <div class="form-container">
            <form action="process.php" method="POST">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="dni" class="form-label"><i class="fa-solid fa-id-card"></i> DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombres" class="form-label"><i class="fa-solid fa-user"></i> Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellidos" class="form-label"><i class="fa-solid fa-user-tag"></i> Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion" class="form-label"><i class="fa-solid fa-map-marker-alt"></i>
                            Dirección</label>
                        <input class="form-control" id="direccion" name="direccion"></input>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label"><i class="fa-solid fa-phone"></i> Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-md-6">
                        <label for="cargo" class="form-label"><i class="fa-solid fa-briefcase"></i> Cargo</label>
                        <select class="form-select" id="cargo" name="cargo_id" required>
                            <option value="">Seleccionar Cargo</option>
                            <?php foreach ($cargos as $cargo): ?>
                                <option value="<?= $cargo['id'] ?>"><?= $cargo['nombrecargo'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar
                            Empleado</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- Fin del Formulario -->

        <!-- Tabla de empleados -->
        <div class="table-container">
            <h2 class="text-center mb-3"><i class="fa-solid fa-address-book"></i> Lista de Empleados</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
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
                                    <a href="edit.php?id=<?= $empleado['idempleado'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>

                                    <a href="delete.php?id=<?= $empleado['idempleado'] ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Estás seguro de eliminar este empleado?');">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </a>

                                </td>

                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($empleados)): ?>
                            <tr>
                                <td colspan="8">No hay empleados registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>