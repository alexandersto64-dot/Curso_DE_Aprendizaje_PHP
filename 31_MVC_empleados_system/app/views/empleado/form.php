<!-- Vista formulario empleado -->
<?php include '../app/views/layout/header.php'; ?>

<?php 
$edit = isset($empleado);
?>

<div class="container mt-4 mb-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-primary text-white rounded-top-4">
      <h4 class="mb-0">
        <i class="fa <?= $edit ? 'fa-edit' : 'fa-user-plus' ?> me-2"></i>
        <?= $edit ? "Editar Empleado" : "Nuevo Empleado" ?>
      </h4>
    </div>

    <div class="card-body p-4">

      <?php if (!empty($errores)): ?>
        <div class="alert alert-danger shadow-sm">
          <ul class="mb-0">
            <?php foreach ($errores as $error): ?>
              <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="POST" id="empleadoForm" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="dni" class="form-label fw-semibold">DNI</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fa fa-id-card text-primary"></i></span>
              <input type="text" name="dni" id="dni" class="form-control shadow-sm" required
                placeholder="Ingrese DNI del empleado"
                value="<?= $edit ? htmlspecialchars($empleado['dni']) : '' ?>">
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="idcargo" class="form-label fw-semibold">Cargo</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fa fa-briefcase text-primary"></i></span>
              <select name="idcargo" id="idcargo" class="form-select shadow-sm" required>
                <option value="">Seleccione un cargo...</option>
                <?php foreach($cargos as $cargo): ?>
                  <option value="<?= $cargo['idcargo'] ?>"
                    <?= $edit && $empleado['idcargo'] == $cargo['idcargo'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cargo['nombrecargo']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nombres" class="form-label fw-semibold">Nombres</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fa fa-user text-primary"></i></span>
              <input type="text" name="nombres" id="nombres" class="form-control shadow-sm" required
                placeholder="Ingrese nombres"
                value="<?= $edit ? htmlspecialchars($empleado['nombres']) : '' ?>">
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <label for="apellidos" class="form-label fw-semibold">Apellidos</label>
            <div class="input-group">
              <span class="input-group-text bg-light"><i class="fa fa-user-tag text-primary"></i></span>
              <input type="text" name="apellidos" id="apellidos" class="form-control shadow-sm" required
                placeholder="Ingrese apellidos"
                value="<?= $edit ? htmlspecialchars($empleado['apellidos']) : '' ?>">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="direccion" class="form-label fw-semibold">Dirección</label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fa fa-map-marker-alt text-primary"></i></span>
            <input type="text" name="direccion" id="direccion" class="form-control shadow-sm"
              placeholder="Ingrese dirección"
              value="<?= $edit ? htmlspecialchars($empleado['direccion']) : '' ?>">
          </div>
        </div>

        <div class="mb-3">
          <label for="telefono" class="form-label fw-semibold">Teléfono</label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fa fa-phone text-primary"></i></span>
            <input type="text" name="telefono" id="telefono" class="form-control shadow-sm"
              placeholder="Ingrese número telefónico"
              value="<?= $edit ? htmlspecialchars($empleado['telefono']) : '' ?>">
          </div>
        </div>

        <div class="mb-3">
          <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
          <div class="input-group">
            <span class="input-group-text bg-light"><i class="fa fa-comment text-primary"></i></span>
            <textarea name="observaciones" id="observaciones" class="form-control shadow-sm"
              placeholder="Escriba observaciones..."><?= $edit ? htmlspecialchars($empleado['observaciones']) : '' ?></textarea>
          </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="?controller=empleado&action=index" class="btn btn-outline-secondary px-4">
            <i class="fa fa-arrow-left me-2"></i>Cancelar
          </a>
          <button type="submit" class="btn btn-success px-4">
            <i class="fa <?= $edit ? 'fa-sync' : 'fa-save' ?> me-2"></i>
            <?= $edit ? "Actualizar" : "Guardar" ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Estilos personalizados -->
<style>
  .card {
    transition: all 0.3s ease;
  }
  .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
  }
  input:focus, select:focus, textarea:focus {
    border-color: #0d6efd !important;
    box-shadow: 0 0 6px rgba(13, 110, 253, 0.3) !important;
  }
  .input-group-text {
    border-right: 0;
  }
  .form-control, .form-select, textarea {
    border-left: 0;
  }
  .form-control:focus, .form-select:focus, textarea:focus {
    border-color: #0d6efd;
  }
</style>

<?php include '../app/views/layout/footer.php'; ?>
