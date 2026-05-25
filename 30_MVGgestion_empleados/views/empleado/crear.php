<div class="card mx-auto shadow-lg border-0 rounded-4" style="max-width: 900px;">
  <div class="card-header bg-dark text-white text-center rounded-top-4">
    <h3 class="mb-0"><i class="fa fa-user-plus"></i> Nuevo Empleado</h3>
  </div>

  <div class="card-body">
    <?php if (isset($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-exclamation-circle me-2"></i> <?= htmlspecialchars($error) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <form action="index.php?accion=guardar" method="POST" class="needs-validation" novalidate>
      <div class="row g-3">
        <div class="col-md-6">
          <label for="dni" class="form-label fw-semibold"><i class="fa fa-id-card me-1"></i> DNI</label>
          <input type="text" class="form-control form-control-lg" name="dni" id="dni" placeholder="Ingrese DNI" required value="<?= htmlspecialchars($_POST['dni'] ?? '') ?>">
          <div class="invalid-feedback">Por favor ingrese un DNI válido.</div>
        </div>

        <div class="col-md-6">
          <label for="nombres" class="form-label fw-semibold"><i class="fa fa-user me-1"></i> Nombres</label>
          <input type="text" class="form-control form-control-lg" name="nombres" id="nombres" placeholder="Ingrese nombres" required value="<?= htmlspecialchars($_POST['nombres'] ?? '') ?>">
          <div class="invalid-feedback">Por favor ingrese los nombres.</div>
        </div>

        <div class="col-md-6">
          <label for="apellidos" class="form-label fw-semibold"><i class="fa fa-user-tag me-1"></i> Apellidos</label>
          <input type="text" class="form-control form-control-lg" name="apellidos" id="apellidos" placeholder="Ingrese apellidos" required value="<?= htmlspecialchars($_POST['apellidos'] ?? '') ?>">
          <div class="invalid-feedback">Por favor ingrese los apellidos.</div>
        </div>

        <div class="col-md-6">
          <label for="telefono" class="form-label fw-semibold"><i class="fa fa-phone me-1"></i> Teléfono</label>
          <input type="text" class="form-control form-control-lg" name="telefono" id="telefono" placeholder="Ingrese teléfono" required value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>">
          <div class="invalid-feedback">Por favor ingrese un número de teléfono.</div>
        </div>

        <div class="col-md-12">
          <label for="direccion" class="form-label fw-semibold"><i class="fa fa-map-marker-alt me-1"></i> Dirección</label>
          <textarea class="form-control form-control-lg" name="direccion" id="direccion" placeholder="Ingrese dirección" rows="3" required><?= htmlspecialchars($_POST['direccion'] ?? '') ?></textarea>
          <div class="invalid-feedback">Por favor ingrese una dirección.</div>
        </div>

        <div class="col-md-6">
          <label for="cargo_id" class="form-label fw-semibold"><i class="fa fa-briefcase me-1"></i> Cargo</label>
          <select name="cargo_id" id="cargo_id" class="form-select form-select-lg" required>
            <option value="">-- Selecciona Cargo --</option>
            <?php foreach($cargos as $c): ?>
              <option value="<?= $c['id'] ?>" <?= (($_POST['cargo_id'] ?? '') == $c['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['nombrecargo']) ?>
              </option>
            <?php endforeach; ?>
          </select>
          <div class="invalid-feedback">Por favor seleccione un cargo.</div>
        </div>
      </div>

      <div class="text-end mt-4">
        <a href="index.php?accion=index" class="btn btn-outline-secondary btn-lg me-2">
          <i class="fa fa-arrow-left"></i> Cancelar
        </a>
        <button type="submit" class="btn btn-primary btn-lg">
          <i class="fa fa-save me-1"></i> Guardar
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  // Validación Bootstrap
  (function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>
