<?php

include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM empleado WHERE idempleado = ?");
    $stmt->execute([$id]);
    $empleado = $stmt->fetch();
    $stmt_cargo = $pdo->query("SELECT * FROM cargo");

    $cargos = $stmt_cargo->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $cargo_id = $_POST['cargo_id'];

    $stmt = $pdo->prepare("UPDATE empleado SET dni = ?, nombres = ?, apellidos = ?, direccion = ?, telefono = ?, cargo_id = ? WHERE idempleado = ?");
    $stmt->execute([$dni, $nombres, $apellidos, $direccion, $telefono, $cargo_id, $id]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            padding: 30px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        h3 i {
            margin-right: 10px;
        }

        label i {
            margin-right: 5px;
        }

        .btn-primary {
            padding: 10px 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-header text-center">
                <h3><i class="fas fa-user-edit"></i> Editar Empleado</h3>
            </div>
            <div class="card-body">
                <form action="edit.php?id=<?= $empleado['idempleado'] ?>" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="dni" class="form-label"><i class="fa-solid fa-id-card"></i> DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?= $empleado['dni'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="nombres" class="form-label"><i class="fa-solid fa-user"></i> Nombres</label>
                            <input type="text" class="form-control" id="nombres" name="nombres" value="<?= $empleado['nombres'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellidos" class="form-label"><i class="fa-solid fa-user-tag"></i> Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $empleado['apellidos'] ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label"><i class="fa-solid fa-location-dot"></i> Dirección</label>
                            <textarea class="form-control" id="direccion" name="direccion"><?= $empleado['direccion'] ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="telefono" class="form-label"><i class="fa-solid fa-phone"></i> Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $empleado['telefono'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="cargo" class="form-label"><i class="fa-solid fa-briefcase"></i> Cargo</label>
                            <select class="form-select" id="cargo" name="cargo_id" required>
                                <option value="">Seleccionar Cargo</option>
                                <?php foreach ($cargos as $cargo): ?>
                                    <option value="<?= $cargo['id'] ?>" <?= $empleado['cargo_id'] == $cargo['id'] ? 'selected' : '' ?>>
                                        <?= $cargo['nombrecargo'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-save"></i> Actualizar Empleado
                            </button>
                            <a href="index.php" class="btn btn-secondary ms-2">
                                <i class="fa-solid fa-arrow-left"></i> Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>