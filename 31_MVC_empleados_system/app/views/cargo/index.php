<!-- Vista lista cargos -->
<?php include '../app/views/layout/header.php'; ?>
<div class="d-flex justify-content-between mb-3">
  <h3>Cargos</h3>
  <a href="?controller=cargo&action=create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Nuevo Cargo</a>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre Cargo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($cargos as $cargo): ?>
    <tr>
      <td><?= $cargo['idcargo'] ?></td>
      <td><?= htmlspecialchars($cargo['nombrecargo']) ?></td>
      <td>
        <a href="?controller=cargo&action=edit&idcargo=<?= $cargo['idcargo'] ?>" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen"></i></a>
        <a href="?controller=cargo&action=delete&idcargo=<?= $cargo['idcargo'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cargo?');"><i class="fa-solid fa-trash"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '../app/views/layout/footer.php'; ?>
