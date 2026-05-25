<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$controller = $_GET['controller'] ?? '';
$action     = $_GET['action']     ?? '';

if (!isset($_SESSION['user_id'])) {
    if (!($controller === 'user' && ($action === 'login' || $action === 'register'))) {
        header("Location: ?controller=user&action=login");
        exit;
    }
}

// BASE_URL puede no estar definida si se accede a la vista directamente
$base = defined('BASE_URL') ? BASE_URL : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema MVC</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link href="<?= $base ?>/css/styles.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="?controller=empleado&action=index">
      <i class="fa-solid fa-gear me-1"></i> Sistema
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php if (isset($_SESSION['user_id'])): ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="?controller=empleado&action=index" class="nav-link">
            <i class="fa fa-users me-1"></i>Empleados
          </a>
        </li>
        <li class="nav-item">
          <a href="?controller=cargo&action=index" class="nav-link">
            <i class="fa fa-briefcase me-1"></i>Cargos
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="?controller=user&action=logout" class="nav-link">
            <i class="fa-solid fa-right-from-bracket me-1"></i>Salir
          </a>
        </li>
      </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>

<main class="container mt-4 mb-5">
