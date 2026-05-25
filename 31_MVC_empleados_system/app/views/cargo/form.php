<!-- Vista formulario cargo -->
<?php include '../app/views/layout/header.php'; ?>

<?php 
$edit = isset($cargo);
?>

<h3><?= $edit ? "Editar Cargo" : "Nuevo Cargo" ?></h3>

<form method="POST" id="cargoForm">
  <div class="mb-3">
    <label for="nombrecargo" class="form-label">Nombre del Cargo</label>
    <input type="text" name="nombrecargo" id="nombrecargo" class="form-control" required value="<?= $edit ? htmlspecialchars($cargo['nombrecargo']) : '' ?>">
  </div>
  <button type="submit" class="btn btn-success"><?= $edit ? "Actualizar" : "Guardar" ?></button>
  <a href="?controller=cargo&action=index" class="btn btn-secondary">Cancelar</a>
</form>

<?php include '../app/views/layout/footer.php'; ?>
