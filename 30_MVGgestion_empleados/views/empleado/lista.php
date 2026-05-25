<div class="container-box">

    <div class="d-flex justify-content-between align-items-center flex-wrap top-actions mb-4">
        <h3><i class="fa fa-users me-2"></i>Empleados</h3>
        <a href="index.php?accion=crear" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Nuevo
        </a>
    </div>

    <table id="example" class="table table-striped">
        <thead>
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
                            <div class="acciones">
                                <a href="index.php?accion=editar&id=<?= $e['idempleado'] ?>"
                                   class="btn-editar" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="index.php?accion=eliminar&id=<?= $e['idempleado'] ?>"
                                   class="btn-eliminar" title="Eliminar"
                                   onclick="return confirm('¿Eliminar empleado?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
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
