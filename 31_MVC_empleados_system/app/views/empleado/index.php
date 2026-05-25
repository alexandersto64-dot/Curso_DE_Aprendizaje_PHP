<?php include '../app/views/layout/header.php'; ?>

<div class="container-box">

    <div class="d-flex justify-content-between align-items-center flex-wrap top-actions mb-4">
        <h3><i class="fa fa-users me-2"></i>Gestión de Empleados</h3>
        <a href="?controller=empleado&action=create" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Nuevo Empleado
        </a>
    </div>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($empleados)): ?>
                <?php foreach($empleados as $emp): ?>
                    <tr>
                        <td><?= $emp['idempleado'] ?></td>
                        <td><?= htmlspecialchars($emp['dni']) ?></td>
                        <td><?= htmlspecialchars($emp['nombres']) ?></td>
                        <td><?= htmlspecialchars($emp['apellidos']) ?></td>
                        <td><?= htmlspecialchars($emp['nombrecargo']) ?></td>
                        <td><?= htmlspecialchars($emp['telefono']) ?></td>
                        <td><?= htmlspecialchars($emp['observaciones']) ?></td>
                        <td>
                            <div class="acciones">
                                <a href="?controller=empleado&action=edit&idempleado=<?= $emp['idempleado'] ?>"
                                   class="btn-editar" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="?controller=empleado&action=delete&idempleado=<?= $emp['idempleado'] ?>"
                                   class="btn-eliminar" title="Eliminar"
                                   onclick="return confirm('¿Deseas eliminar este empleado?');">
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

<?php include '../app/views/layout/footer.php'; ?>
