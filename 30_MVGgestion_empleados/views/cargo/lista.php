<div class="d-flex justify-content-between mb-3">
    <h3><i class="fa fa-users"></i> Empleados</h3>
    <a href="cargo_index.php?accion=crear" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo</a>
</div>
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nombre del Cargo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cargos)): ?>
            <?php foreach($cargos as $cargo): ?>
                <tr>
                    <td><?= $cargo['id'] ?></td>
                    <td><?= $cargo['nombrecargo'] ?></td>
                    <td>
                        <a href="cargo_index.php?controller=cargo&action=editar&id=<?= $cargo['id'] ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <a href="cargo_index.php?controller=cargo&action=eliminar&id=<?= $cargo['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este cargo?');">
                            <i class="fa fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3">No hay cargos registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
