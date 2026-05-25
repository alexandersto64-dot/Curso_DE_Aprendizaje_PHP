<div class="container mt-4">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-primary text-white d-flex align-items-center rounded-top-4">
      <i class="fa fa-user-edit me-2"></i>
      <h4 class="mb-0">Editar Empleado</h4>
    </div>

    <div class="card-body">
      <form action="index.php?accion=actualizar&id=<?= $empleado['idempleado'] ?>" method="POST" class="row g-3">
        
        <div class="col-md-6">
          <label for="dni" class="form-label"><i class="fa fa-id-card me-1"></i> DNI</label>
          <input type="text" class="form-control form-control-lg" id="dni" name="dni" value="<?= htmlspecialchars($empleado['dni']) ?>" required>
        </div>

        <div class="col-md-6">
          <label for="nombres" class="form-label"><i class="fa fa-user me-1"></i> Nombres</label>
          <input type="text" class="form-control form-control-lg" id="nombres" name="nombres" value="<?= htmlspecialchars($empleado['nombres']) ?>" required>
        </div>

        <div class="col-md-6">
          <label for="apellidos" class="form-label"><i class="fa fa-user-tag me-1"></i> Apellidos</label>
          <input type="text" class="form-control form-control-lg" id="apellidos" name="apellidos" value="<?= htmlspecialchars($empleado['apellidos']) ?>" required>
        </div>

        <div class="col-md-6">
          <label for="telefono" class="form-label"><i class="fa fa-phone me-1"></i> Teléfono</label>
          <input type="text" class="form-control form-control-lg" id="telefono" name="telefono" value="<?= htmlspecialchars($empleado['telefono']) ?>">
        </div>

        <div class="col-12">
          <label for="direccion" class="form-label"><i class="fa fa-map-marker-alt me-1"></i> Dirección</label>
          <textarea class="form-control form-control-lg" id="direccion" name="direccion" rows="2" required><?= htmlspecialchars($empleado['direccion']) ?></textarea>
        </div>

        <div class="col-md-6">
          <label for="cargo_id" class="form-label"><i class="fa fa-briefcase me-1"></i> Cargo</label>
          <select id="cargo_id" name="cargo_id" class="form-select form-select-lg" required>
            <option value="">Seleccionar Cargo</option>
            <?php foreach ($cargos as $c): ?>
              <option value="<?= $c['id'] ?>" <?= $empleado['cargo_id'] == $c['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['nombrecargo']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="col-12 text-end mt-4">
          <a href="index.php?accion=index" class="btn btn-outline-secondary btn-lg me-2">
            <i class="fa fa-arrow-left"></i> Cancelar
          </a>
          <button type="submit" class="btn btn-primary btn-lg">
            <i class="fa fa-save me-1"></i> Actualizar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
