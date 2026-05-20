<?php
include 'db.php';

// ====================================
// OBTENER DATOS DEL ALUMNO
// ====================================

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM view_alumnos WHERE idalumno = ?");
    $stmt->execute([$id]);

    $alumno = $stmt->fetch();
}

// ====================================
// ACTUALIZAR DATOS
// ====================================

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id          = $_POST['id'];
    $dni         = $_POST['dni'];
    $nombres     = $_POST['nombres'];
    $apellidos   = $_POST['apellidos'];
    $direccion   = $_POST['direccion'];
    $telefono    = $_POST['telefono'];
    $carrera_id  = $_POST['carrera_id'];
    $curso_id    = $_POST['curso_id'];
    $ciclo_id    = $_POST['ciclo_id'];
    $promedio    = $_POST['promedio'];

    // ====================================
    // UPDATE ALUMNO
    // ====================================

    $stmtAlumno = $pdo->prepare("
        UPDATE alumno
        SET
            dni = ?,
            nombres = ?,
            apellidos = ?,
            direccion = ?,
            telefono = ?,
            carrera_id = ?
        WHERE idalumno = ?
    ");

    $stmtAlumno->execute([
        $dni,
        $nombres,
        $apellidos,
        $direccion,
        $telefono,
        $carrera_id,
        $id
    ]);

    // ====================================
    // UPDATE MATRÍCULA
    // ====================================

    $stmtMatricula = $pdo->prepare("
        UPDATE matricula
        SET
            curso_id = ?,
            ciclo_id = ?,
            promedio = ?
        WHERE alumno_id = ?
    ");

    $stmtMatricula->execute([
        $curso_id,
        $ciclo_id,
        $promedio,
        $id
    ]);

    header("Location: index.php");
    exit();
}

// ====================================
// COMBOBOX
// ====================================

$carreras = $pdo->query("SELECT * FROM view_combo_carreras")->fetchAll();

$cursos = $pdo->query("SELECT * FROM view_combo_cursos")->fetchAll();

$ciclos = $pdo->query("SELECT * FROM view_combo_ciclos")->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow p-4">

            <h2 class="text-center mb-4">
                <i class="fa-solid fa-user-pen"></i>
                Editar Alumno
            </h2>

            <form action="" method="POST">

                <!-- ID -->
                <input type="hidden" name="id" value="<?= $alumno['idalumno'] ?>">

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
                            value="<?= htmlspecialchars($alumno['dni']) ?>"
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
                            value="<?= htmlspecialchars($alumno['nombres']) ?>"
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
                            value="<?= htmlspecialchars($alumno['apellidos']) ?>"
                            required>

                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="fa-solid fa-location-dot"></i>
                            Dirección
                        </label>

                        <input
                            type="text"
                            name="direccion"
                            class="form-control"
                            value="<?= htmlspecialchars($alumno['direccion']) ?>">

                    </div>

                    <!-- TELÉFONO -->
                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="fa-solid fa-phone"></i>
                            Teléfono
                        </label>

                        <input
                            type="text"
                            name="telefono"
                            class="form-control"
                            value="<?= htmlspecialchars($alumno['telefono']) ?>">

                    </div>

                    <!-- CARRERA -->
                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="fa-solid fa-graduation-cap"></i>
                            Carrera
                        </label>

                        <select name="carrera_id" class="form-select" required>

                            <option value="">
                                Seleccionar Carrera
                            </option>

                            <?php foreach ($carreras as $carrera): ?>

                                <option
                                    value="<?= $carrera['idcarrera'] ?>"
                                    <?= $alumno['idcarrera'] == $carrera['idcarrera'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($carrera['nombrecarrera']) ?>
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

                        <select name="curso_id" class="form-select" required>

                            <option value="">
                                Seleccionar Curso
                            </option>

                            <?php foreach ($cursos as $curso): ?>

                                <option
                                    value="<?= $curso['idcurso'] ?>"
                                    <?= $alumno['idcurso'] == $curso['idcurso'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($curso['curso_label']) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- CICLO -->
                    <div class="col-md-6">

                        <label class="form-label">
                            <i class="fa-solid fa-calendar-days"></i>
                            Ciclo
                        </label>

                        <select name="ciclo_id" class="form-select" required>

                            <option value="">
                                Seleccionar Ciclo
                            </option>

                            <?php foreach ($ciclos as $ciclo): ?>

                                <option
                                    value="<?= $ciclo['idciclo'] ?>"
                                    <?= $alumno['idciclo'] == $ciclo['idciclo'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($ciclo['nombreciclo']) ?>
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
                            value="<?= $alumno['promedio'] ?>"
                            required>

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

</body>

</html>