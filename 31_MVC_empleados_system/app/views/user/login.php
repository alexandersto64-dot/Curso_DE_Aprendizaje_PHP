<?php include '../app/views/layout/header.php'; ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow-lg rounded-4 border-0">
        <div class="card-body p-4">
          <h3 class="mb-4 text-center text-primary"><i class="fas fa-user-lock me-2"></i>Iniciar sesión</h3>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
          <?php endif; ?>
          <form method="POST" id="loginForm" novalidate>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
              <label for="correo"><i class="fas fa-envelope me-2"></i>Correo</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required minlength="6">
              <label for="password"><i class="fas fa-lock me-2"></i>Contraseña</label>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">Entrar <i class="fas fa-sign-in-alt ms-2"></i></button>
            </div>
          </form>
          <p class="mt-3 text-center">¿No tienes cuenta? <a href="?controller=user&action=register" class="text-decoration-none">Regístrate aquí</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include '../app/views/layout/footer.php'; ?>
