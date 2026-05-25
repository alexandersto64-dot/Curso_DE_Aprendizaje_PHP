<div class="container mt-4">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="card-header bg-success text-white d-flex align-items-center rounded-top-4">
      <i class="fa fa-plus me-2"></i>
      <h4 class="mb-0">Nuevo Cargo</h4>
    </div>

    <div class="card-body">
      <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fa fa-exclamation-circle me-2"></i> <?= htmlspecialchars($error) ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <form action="cargo_index.php?controller=cargo&action=guardar" method="POST" class="needs-validation" novalidate>
        <div class="mb-4">
          <label for="nombrecargo" class="form-label fw-semibold">
            <i class="fa fa-briefcase me-1"></i> Nombre del Cargo
          </label>
          <input type="text" class="form-control form-control-lg" name="nombrecargo" id="nombrecargo" 
            placeholder="Ingrese el nombre del cargo" required 
            value="<?= htmlspecialchars($_POST['nombrecargo'] ?? '') ?>">
          <div class="invalid-feedback">Por favor, ingrese un nombre de cargo válido.</div>
        </div>

        <div class="text-end">
          <a href="cargo_index.php?action=index" class="btn btn-outline-secondary btn-lg me-2">
            <i class="fa fa-arrow-left"></i> Cancelar
          </a>
          <button type="submit" class="btn btn-success btn-lg">
            <i class="fa fa-save me-1"></i> Guardar
          </button>
        </div>
      </form>
    </div>
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
