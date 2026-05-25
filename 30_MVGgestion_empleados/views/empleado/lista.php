<div class="card p-4 shadow-sm mb-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3><i class="fa fa-users"></i> Empleados</h3>
        <a href="index.php?accion=crear" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nuevo
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($empleados)): ?>
                    <?php foreach($empleados as $e): ?>
                        <tr>
                            <td><?= $e['idempleado'] ?></td>
                            <td><?= $e['dni'] ?></td>
                            <td><?= $e['nombres'] ?></td>
                            <td><?= $e['apellidos'] ?></td>
                            <td><?= $e['nombrecargo'] ?></td>
                            <td>
                                <a href="index.php?accion=editar&id=<?= $e['idempleado'] ?>" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="index.php?accion=eliminar&id=<?= $e['idempleado'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar empleado?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay empleados registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
