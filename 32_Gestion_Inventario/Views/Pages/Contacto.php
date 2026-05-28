<?php
require_once __DIR__ . '/../../Models/Conexion.php';

$errors = [];
$success = false;
$nombres = $apellidos = $telefono_movil = $telefono_casa = '';
$correo = $descripcion_grupo = $observaciones = $fecha_cumpleanios = '';
$id_empresa = $id_operador = $id_grupo = '';

$pdo        = Conexion::conectar();
$empresas   = $pdo->query("SELECT id_empresa, nombre_empresa FROM empresa ORDER BY nombre_empresa")->fetchAll(PDO::FETCH_ASSOC);
$operadores = $pdo->query("SELECT id_operador, nombre_operador FROM operador ORDER BY nombre_operador")->fetchAll(PDO::FETCH_ASSOC);
$grupos     = $pdo->query("SELECT id_grupo, nombre_grupo FROM grupo_contacto ORDER BY nombre_grupo")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombres           = trim($_POST['nombres'] ?? '');
    $apellidos         = trim($_POST['apellidos'] ?? '');
    $id_empresa        = trim($_POST['id_empresa'] ?? '');
    $id_operador       = trim($_POST['id_operador'] ?? '');
    $id_grupo          = trim($_POST['id_grupo'] ?? '');
    $telefono_movil    = trim($_POST['telefono_movil'] ?? '');
    $telefono_casa     = trim($_POST['telefono_casa'] ?? '');
    $correo            = trim($_POST['correo'] ?? '');
    $descripcion_grupo = trim($_POST['descripcion_grupo'] ?? '');
    $fecha_cumpleanios = trim($_POST['fecha_cumpleanios'] ?? '');
    $observaciones     = trim($_POST['observaciones'] ?? '');

    if ($nombres === '') {
        $errors['nombres'] = 'Por favor ingrese los nombres.';
    } elseif (strlen($nombres) > 80) {
        $errors['nombres'] = 'Los nombres no pueden tener más de 80 caracteres.';
    }

    if ($apellidos === '') {
        $errors['apellidos'] = 'Por favor ingrese los apellidos.';
    } elseif (strlen($apellidos) > 80) {
        $errors['apellidos'] = 'Los apellidos no pueden tener más de 80 caracteres.';
    }

    if ($id_empresa === '') {
        $errors['id_empresa'] = 'Por favor seleccione una empresa.';
    }

    if ($id_operador === '') {
        $errors['id_operador'] = 'Por favor seleccione un operador.';
    }

    if ($id_grupo === '') {
        $errors['id_grupo'] = 'Por favor seleccione un grupo.';
    }

    if ($telefono_movil === '') {
        $errors['telefono_movil'] = 'Por favor ingrese el teléfono móvil.';
    } elseif (!preg_match('/^\d{9,11}$/', $telefono_movil)) {
        $errors['telefono_movil'] = 'El teléfono móvil debe contener entre 9 y 11 dígitos.';
    }

    if ($telefono_casa !== '' && !preg_match('/^\d{7,11}$/', $telefono_casa)) {
        $errors['telefono_casa'] = 'El teléfono de casa debe contener entre 7 y 11 dígitos.';
    }

    if ($correo !== '' && !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors['correo'] = 'Por favor ingrese un correo electrónico válido.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("
            INSERT INTO contacto
                (nombres, apellidos, id_empresa, id_operador, id_grupo,
                 telefono_movil, telefono_casa, correo, descripcion_grupo,
                 fecha_cumpleanios, observaciones)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $nombres,
            $apellidos,
            $id_empresa,
            $id_operador,
            $id_grupo,
            $telefono_movil,
            $telefono_casa     ?: null,
            $correo            ?: null,
            $descripcion_grupo ?: null,
            $fecha_cumpleanios ?: null,
            $observaciones     ?: null,
        ]);
        $success = true;
        $nombres = $apellidos = $telefono_movil = $telefono_casa = '';
        $correo = $descripcion_grupo = $observaciones = $fecha_cumpleanios = '';
        $id_empresa = $id_operador = $id_grupo = '';
    }
}
?>

<section class="content">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="fa fa-user-plus"></i>
                        Nuevo Contacto
                    </h3>
                </div>

                <?php if ($success): ?>
                    <div class="alert alert-success alert-dismissible margin" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa fa-check-circle"></i>
                        <strong>¡Éxito!</strong> El contacto fue registrado correctamente.
                    </div>
                <?php endif; ?>

                <form method="POST">

                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= isset($errors['nombres']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-user"></i> Nombres</label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="nombres"
                                        placeholder="Ingrese nombres"
                                        maxlength="80"
                                        value="<?= htmlspecialchars($nombres) ?>">
                                    <?php if (isset($errors['nombres'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['nombres'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= isset($errors['apellidos']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-user"></i> Apellidos</label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="apellidos"
                                        placeholder="Ingrese apellidos"
                                        maxlength="80"
                                        value="<?= htmlspecialchars($apellidos) ?>">
                                    <?php if (isset($errors['apellidos'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['apellidos'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group <?= isset($errors['id_empresa']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-building"></i> Empresa</label>
                                    <select class="form-control input-lg" name="id_empresa">
                                        <option value="">-- Selecciona Empresa --</option>
                                        <?php foreach ($empresas as $e): ?>
                                            <option value="<?= $e['id_empresa'] ?>"
                                                <?= $id_empresa == $e['id_empresa'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($e['nombre_empresa']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['id_empresa'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['id_empresa'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?= isset($errors['id_operador']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-phone-square"></i> Operador</label>
                                    <select class="form-control input-lg" name="id_operador">
                                        <option value="">-- Selecciona Operador --</option>
                                        <?php foreach ($operadores as $o): ?>
                                            <option value="<?= $o['id_operador'] ?>"
                                                <?= $id_operador === $o['id_operador'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($o['nombre_operador']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['id_operador'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['id_operador'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group <?= isset($errors['id_grupo']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-users"></i> Grupo</label>
                                    <select class="form-control input-lg" name="id_grupo">
                                        <option value="">-- Selecciona Grupo --</option>
                                        <?php foreach ($grupos as $g): ?>
                                            <option value="<?= $g['id_grupo'] ?>"
                                                <?= $id_grupo === $g['id_grupo'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($g['nombre_grupo']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (isset($errors['id_grupo'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['id_grupo'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= isset($errors['telefono_movil']) ? 'has-error' : '' ?>">
                                    <label><i class="fa fa-mobile"></i> Teléfono Móvil</label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="telefono_movil"
                                        placeholder="Ej: 987654321"
                                        maxlength="11"
                                        value="<?= htmlspecialchars($telefono_movil) ?>">
                                    <?php if (isset($errors['telefono_movil'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['telefono_movil'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group <?= isset($errors['telefono_casa']) ? 'has-error' : '' ?>">
                                    <label>
                                        <i class="fa fa-phone"></i> Teléfono Casa
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="telefono_casa"
                                        placeholder="Ej: 014785236"
                                        maxlength="11"
                                        value="<?= htmlspecialchars($telefono_casa) ?>">
                                    <?php if (isset($errors['telefono_casa'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['telefono_casa'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group <?= isset($errors['correo']) ? 'has-error' : '' ?>">
                                    <label>
                                        <i class="fa fa-envelope"></i> Correo Electrónico
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="email"
                                        class="form-control input-lg"
                                        name="correo"
                                        placeholder="ejemplo@gmail.com"
                                        maxlength="90"
                                        value="<?= htmlspecialchars($correo) ?>">
                                    <?php if (isset($errors['correo'])): ?>
                                        <span class="help-block">
                                            <i class="fa fa-exclamation-circle"></i>
                                            <?= $errors['correo'] ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-birthday-cake"></i> Fecha de Cumpleaños
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="date"
                                        class="form-control input-lg"
                                        name="fecha_cumpleanios"
                                        value="<?= htmlspecialchars($fecha_cumpleanios) ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-tag"></i> Descripción Grupo
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="descripcion_grupo"
                                        placeholder="Ej: Compañero de trabajo"
                                        maxlength="80"
                                        value="<?= htmlspecialchars($descripcion_grupo) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <i class="fa fa-sticky-note"></i> Observaciones
                                        <small class="text-muted">(opcional)</small>
                                    </label>
                                    <input type="text"
                                        class="form-control input-lg"
                                        name="observaciones"
                                        placeholder="Ingrese observaciones"
                                        maxlength="100"
                                        value="<?= htmlspecialchars($observaciones) ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer text-right">
                        <a href="index.php?Pages=Listar_Contacto" class="btn btn-default btn-lg">
                            <i class="fa fa-arrow-left"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-info btn-lg">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</section>