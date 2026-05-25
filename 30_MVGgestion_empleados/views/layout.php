<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Empleados</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <style>
    html, body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
      background-color: #f8f9fa;
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
    }

    main {
      flex: 1;
    }

    .navbar-brand {
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .navbar {
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
      font-weight: 500;
      transition: all 0.2s ease;
    }

    .nav-link:hover {
      color: #ffc107 !important;
      transform: translateY(-1px);
    }

    footer {
      padding: 20px 0;
      text-align: center;
      font-size: 0.9rem;
      color: #6c757d;
      background-color: #fff;
      border-top: 1px solid #dee2e6;
    }

    @media (max-width: 768px) {
      .navbar-brand {
        font-size: 1.1rem;
      }

      .nav-link {
        font-size: 0.95rem;
        padding: 0.5rem 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <i class="fa fa-building me-2"></i>Gestión de Empleados
      </a>

      <!-- Botón responsive -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menú -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fa fa-users me-1"></i> Empleados</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cargo_index.php"><i class="fa fa-briefcase me-1"></i> Cargos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido dinámico -->
  <main class="container mb-5">
    <?php include $contenido; ?>
  </main>

  <!-- Footer fijo al final -->
  <footer>
    <div class="container">
      <p class="mb-0">
        &copy; <?= date('Y') ?> Sistema de Gestión de Empleados · Desarrollado con 
        <i class="fa fa-heart text-danger"></i> y PHP MVC
      </p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
