<?php
include 'db.php';

// ====================================
// INSERTAR DATOS
// ====================================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dni       = $_POST['dni'];
    $nombres   = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $telefono  = $_POST['telefono'];

    $carrera_id = $_POST['carrera_id'];
    $curso_id   = $_POST['curso_id'];
    $ciclo_id   = $_POST['ciclo_id'];

    $promedio   = $_POST['promedio'];

    $fecha_matricula = date('Y-m-d');

    // INSERTAR ALUMNO
    $stmt = $pdo->prepare("
        INSERT INTO alumno
        (
            dni,
            nombres,
            apellidos,
            direccion,
            telefono,
            carrera_id
        )
        VALUES
        (
            ?, ?, ?, ?, ?, ?
        )
    ");

    $stmt->execute([
        $dni,
        $nombres,
        $apellidos,
        $direccion,
        $telefono,
        $carrera_id
    ]);

    $nuevo_id = $pdo->lastInsertId();

    // INSERTAR MATRÍCULA
    $stmtMatricula = $pdo->prepare("
        INSERT INTO matricula
        (
            alumno_id,
            curso_id,
            ciclo_id,
            fecha_matricula,
            promedio
        )
        VALUES
        (
            ?, ?, ?, ?, ?
        )
    ");

    $stmtMatricula->execute([
        $nuevo_id,
        $curso_id,
        $ciclo_id,
        $fecha_matricula,
        $promedio
    ]);

    header("Location: index.php");

    exit();
}

// ====================================
// COMBOBOX
// ====================================

$carreras = $pdo->query("
    SELECT * FROM view_combo_carreras
")->fetchAll();

$cursos = $pdo->query("
    SELECT * FROM view_combo_cursos
")->fetchAll();

$ciclos = $pdo->query("
    SELECT * FROM view_combo_ciclos
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear Alumno</title>

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

                <i class="fa-solid fa-user-graduate"></i>
                Nuevo Alumno

            </h2>

            <!-- FORM -->
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

                    <!-- CARRERA -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-graduation-cap"></i>
                            Carrera

                        </label>

                        <select
                            name="carrera_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Carrera
                            </option>

                            <?php foreach ($carreras as $c): ?>

                                <option value="<?= $c['idcarrera'] ?>">

                                    <?= htmlspecialchars($c['nombrecarrera']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- CURSO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-book"></i>
                            Curso

                        </label>

                        <select
                            name="curso_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Curso
                            </option>

                            <?php foreach ($cursos as $c): ?>

                                <option value="<?= $c['idcurso'] ?>">

                                    <?= htmlspecialchars($c['nombrecurso']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- CICLO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-calendar"></i>
                            Ciclo

                        </label>

                        <select
                            name="ciclo_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Ciclo
                            </option>

                            <?php foreach ($ciclos as $c): ?>

                                <option value="<?= $c['idciclo'] ?>">

                                    <?= htmlspecialchars($c['nombreciclo']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- PROMEDIO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-chart-line"></i>
                            Promedio

                        </label>

                        <input
                            type="number"
                            name="promedio"
                            class="form-control"
                            step="0.01"
                            min="0"
                            max="20"
                            required>

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