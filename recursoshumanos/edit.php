<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id              = $_POST['id'];
    $dni             = $_POST['dni'];
    $nombres         = $_POST['nombres'];
    $apellidos       = $_POST['apellidos'];
    $telefono        = $_POST['telefono'];
    $direccion       = $_POST['direccion'];
    $cargo_id        = $_POST['cargo_id'];
    $departamento_id = $_POST['departamento_id'];

    $stmt = $pdo->prepare("
        UPDATE empleado
        SET dni = ?, nombres = ?, apellidos = ?, telefono = ?, direccion = ?,
            cargo_id = ?, departamento_id = ?
        WHERE idempleado = ?
    ");

    $stmt->execute([
        $dni,
        $nombres,
        $apellidos,
        $telefono,
        $direccion,
        $cargo_id,
        $departamento_id,
        $id
    ]);

    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM view_empleados WHERE idempleado = ?");
$stmt->execute([$id]);
$empleado = $stmt->fetch();

$cargos        = $pdo->query("SELECT * FROM view_combo_cargos")->fetchAll();
$departamentos = $pdo->query("SELECT * FROM view_combo_departamentos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            padding: 40px;
        }

        .card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #0d6efd, #0b5ed7);
            color: white;
            padding: 20px;
        }

        .card-header h2 {
            margin: 0;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .25);
        }

        .btn {
            border-radius: 10px;
            padding: 10px 22px;
            font-weight: 600;
        }

        .btn-primary {
            background: #0d6efd;
        }

        .btn-secondary {
            background: #6c757d;
        }

        .icon-label i {
            margin-right: 6px;
            color: #0d6efd;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card mx-auto" style="max-width: 900px;">

            <div class="card-header text-center">
                <h2>
                    <i class="fa-solid fa-user-pen"></i>
                    Editar Empleado
                </h2>
            </div>

            <div class="card-body p-4">

                <form action="" method="POST">

                    <input type="hidden" name="id" value="<?= $empleado['idempleado'] ?>">

                    <div class="row g-4">

                        <!-- DNI -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-id-card"></i>
                                DNI
                            </label>

                            <input type="text"
                                name="dni"
                                class="form-control"
                                value="<?= htmlspecialchars($empleado['dni']) ?>"
                                required>
                        </div>

                        <!-- NOMBRES -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-user"></i>
                                Nombres
                            </label>

                            <input type="text"
                                name="nombres"
                                class="form-control"
                                value="<?= htmlspecialchars($empleado['nombres']) ?>"
                                required>
                        </div>

                        <!-- APELLIDOS -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-user-tag"></i>
                                Apellidos
                            </label>

                            <input type="text"
                                name="apellidos"
                                class="form-control"
                                value="<?= htmlspecialchars($empleado['apellidos']) ?>"
                                required>
                        </div>

                        <!-- TELÉFONO -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-phone"></i>
                                Teléfono
                            </label>

                            <input type="text"
                                name="telefono"
                                class="form-control"
                                value="<?= htmlspecialchars($empleado['telefono']) ?>">
                        </div>

                        <!-- DIRECCIÓN -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-location-dot"></i>
                                Dirección
                            </label>

                            <input type="text"
                                name="direccion"
                                class="form-control"
                                value="<?= htmlspecialchars($empleado['direccion']) ?>">
                        </div>

                        <!-- CARGO -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-briefcase"></i>
                                Cargo
                            </label>

                            <select name="cargo_id" class="form-select" required>

                                <?php foreach ($cargos as $c): ?>

                                    <option value="<?= $c['idcargo'] ?>"
                                        <?= $empleado['idcargo'] == $c['idcargo'] ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($c['cargo_label']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- DEPARTAMENTO -->
                        <div class="col-md-6">
                            <label class="form-label icon-label">
                                <i class="fa-solid fa-building"></i>
                                Departamento
                            </label>

                            <select name="departamento_id" class="form-select" required>

                                <?php foreach ($departamentos as $d): ?>

                                    <option value="<?= $d['iddepartamento'] ?>"
                                        <?= $empleado['iddepartamento'] == $d['iddepartamento'] ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($d['nombredepartamento']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- BOTONES -->
                        <div class="col-12 text-center mt-4">

                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-floppy-disk"></i>
                                Actualizar
                            </button>

                            <a href="index.php" class="btn btn-secondary">
                                <i class="fa-solid fa-arrow-left"></i>
                                Cancelar
                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>