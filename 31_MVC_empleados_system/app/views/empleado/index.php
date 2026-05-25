<?php include '../app/views/layout/header.php'; ?>

<div class="container py-4">
  <!-- Título y botón -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-center text-md-start">
    <h3 class="text-primary mb-3 mb-md-0">
      <i class="fas fa-users me-2"></i>Gestión de Empleados
    </h3>
    <a href="?controller=empleado&action=create" class="btn btn-success shadow-sm">
      <i class="fas fa-user-plus me-1"></i> Nuevo Empleado
    </a>
  </div>

  <!-- Contenedor responsivo -->
  <div class="card shadow-sm border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle mb-0">
          <thead class="table-primary text-center">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">DNI</th>
              <th scope="col">Nombres</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Cargo</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Observaciones</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($empleados)): ?>
              <?php foreach($empleados as $emp): ?>
                <tr>
                  <td class="text-center"><?= $emp['idempleado'] ?></td>
                  <td><?= htmlspecialchars($emp['dni']) ?></td>
                  <td><?= htmlspecialchars($emp['nombres']) ?></td>
                  <td><?= htmlspecialchars($emp['apellidos']) ?></td>
                  <td><?= htmlspecialchars($emp['nombrecargo']) ?></td>
                  <td><?= htmlspecialchars($emp['telefono']) ?></td>
                  <td><?= htmlspecialchars($emp['observaciones']) ?></td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center flex-wrap gap-1">
                      <a href="?controller=empleado&action=edit&idempleado=<?= $emp['idempleado'] ?>" 
                         class="btn btn-sm btn-outline-warning" 
                         title="Editar">
                        <i class="fas fa-pen"></i>
                      </a>
                      <a href="?controller=empleado&action=delete&idempleado=<?= $emp['idempleado'] ?>" 
                         class="btn btn-sm btn-outline-danger" 
                         onclick="return confirm('¿Deseas eliminar este empleado?');" 
                         title="Eliminar">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" class="text-center text-muted py-4">
                  <i class="fas fa-info-circle me-1"></i> No hay empleados registrados.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include '../app/views/layout/footer.php'; ?>
