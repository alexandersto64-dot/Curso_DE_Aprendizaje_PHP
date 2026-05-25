<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Empleados</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <style>
    html, body {
      height: 100%;
    }

    body {
      display: flex;
      flex-direction: column;
      background-color: #eef2f7;
      font-family: 'Segoe UI', Roboto, Arial, sans-serif;
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

    /* ===== ESTILOS DATATABLES (de estilo.css) ===== */

    .container-box {
      background: white;
      padding: 30px;
      border-radius: 24px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    h3 {
      font-weight: 800;
      color: #0f172a;
      letter-spacing: -0.5px;
    }

    table.dataTable {
      border-collapse: separate !important;
      border-spacing: 0 10px !important;
      margin-top: 15px !important;
    }

    table.dataTable thead th {
      background: linear-gradient(135deg, #0d6efd, #2563eb) !important;
      color: white !important;
      font-weight: 700;
      border: none !important;
      padding: 14px 16px !important;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    table.dataTable thead th:first-child {
      border-top-left-radius: 14px;
      border-bottom-left-radius: 14px;
    }

    table.dataTable thead th:last-child {
      border-top-right-radius: 14px;
      border-bottom-right-radius: 14px;
    }

    table.dataTable tbody tr {
      background: white !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
      transition: all 0.25s ease;
    }

    table.dataTable tbody tr:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(37, 99, 235, 0.12);
      background: #f8fbff !important;
    }

    table.dataTable tbody td {
      padding: 12px 16px !important;
      font-size: 14px;
      border-top: 1px solid #f1f5f9 !important;
      border-bottom: 1px solid #f1f5f9 !important;
      vertical-align: middle;
    }

    .page-link {
      border-radius: 10px !important;
      border: none !important;
      margin: 0 3px;
      color: #0d6efd;
    }

    .page-item.active .page-link {
      background: #0d6efd;
      color: white;
    }

    .btn-primary {
      border-radius: 14px;
      padding: 10px 22px;
      font-weight: 600;
    }

    @media (max-width: 768px) {
      .navbar-brand { font-size: 1.1rem; }
      .nav-link { font-size: 0.95rem; padding: 0.5rem 1rem; }
      .container-box { padding: 18px; }
      h3 { text-align: center; margin-bottom: 20px; }
      .top-actions { justify-content: center !important; gap: 10px; }
      .dt-buttons { text-align: center; margin-bottom: 15px; }
      .dt-buttons .btn { margin: 4px; }
      .dt-buttons .buttons-print { margin-top: 10px !important; display: block; width: 100%; }
      .dataTables_filter, .dataTables_length { text-align: center !important; margin-top: 10px; }
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

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

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

  <!-- Footer -->
  <footer>
    <div class="container">
      <p class="mb-0">
        &copy; <?= date('Y') ?> Sistema de Gestión de Empleados · Desarrollado con
        <i class="fa fa-heart text-danger"></i> y PHP MVC
      </p>
    </div>
  </footer>

  <!-- ===== SCRIPTS (orden correcto: jQuery → Bootstrap → DataTables) ===== -->

  <!-- 1. jQuery PRIMERO (DataTables lo requiere) -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- 2. Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- 3. DataTables core -->
  <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>

  <!-- 4. Responsive -->
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
  <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

  <!-- 5. Buttons -->
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.js"></script>

  <!-- 6. Exportar Excel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

  <!-- 7. Exportar PDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <!-- 8. Imprimir -->
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

  <!-- 9. Inicialización DataTable -->
  <script src="views/java.js"></script>

</body>
</html>
