<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni             = $_POST['dni'];
    $nombres         = $_POST['nombres'];
    $apellidos       = $_POST['apellidos'];
    $telefono        = $_POST['telefono'];
    $direccion       = $_POST['direccion'];
    $cargo_id        = $_POST['cargo_id'];
    $departamento_id = $_POST['departamento_id'];

    $stmt = $pdo->prepare("
        INSERT INTO empleado
        (
            dni,
            nombres,
            apellidos,
            telefono,
            direccion,
            cargo_id,
            departamento_id
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $dni,
        $nombres,
        $apellidos,
        $telefono,
        $direccion,
        $cargo_id,
        $departamento_id
    ]);

    header("Location: index.php");
    exit();
}

$cargos = $pdo->query("
    SELECT * FROM view_combo_cargos
")->fetchAll();

$departamentos = $pdo->query("
    SELECT * FROM view_combo_departamentos
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nuevo Empleado</title>

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
            <h2 class="text-center mb-4">

                <i class="fa-solid fa-user-plus"></i>
                Nuevo Empleado

            </h2>

            <!-- FORMULARIO -->
            <form action="" method="POST">

                <div class="row g-3">

                    <!-- DNI -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-id-card"></i>
                            DNI

                        </label>

                        <input
                            type="text"
                            name="dni"
                            class="form-control"
                            maxlength="15"
                            required>

                    </div>

                    <!-- NOMBRES -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-user"></i>
                            Nombres

                        </label>

                        <input
                            type="text"
                            name="nombres"
                            class="form-control"
                            required>

                    </div>

                    <!-- APELLIDOS -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-user-tag"></i>
                            Apellidos

                        </label>

                        <input
                            type="text"
                            name="apellidos"
                            class="form-control"
                            required>

                    </div>

                    <!-- TELEFONO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-phone"></i>
                            Teléfono

                        </label>

                        <input
                            type="text"
                            name="telefono"
                            class="form-control"
                            maxlength="15">

                    </div>

                    <!-- DIRECCION -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-location-dot"></i>
                            Dirección

                        </label>

                        <input
                            type="text"
                            name="direccion"
                            class="form-control">

                    </div>

                    <!-- CARGO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-briefcase"></i>
                            Cargo

                        </label>

                        <select
                            name="cargo_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Cargo
                            </option>

                            <?php foreach ($cargos as $c): ?>

                                <option value="<?= $c['idcargo'] ?>">

                                    <?= htmlspecialchars($c['cargo_label']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- DEPARTAMENTO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-building"></i>
                            Departamento

                        </label>

                        <select
                            name="departamento_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Departamento
                            </option>

                            <?php foreach ($departamentos as $d): ?>

                                <option value="<?= $d['iddepartamento'] ?>">

                                    <?= htmlspecialchars($d['nombredepartamento']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- BOTONES -->
                    <div class="col-12 text-center mt-4">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar

                        </button>

                        <a
                            href="index.php"
                            class="btn btn-secondary">

                            <i class="fa-solid fa-arrow-left"></i>
                            Cancelar

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

</html>