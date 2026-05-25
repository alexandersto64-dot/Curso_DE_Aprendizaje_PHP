<div class="container-box">

    <div class="d-flex justify-content-between align-items-center flex-wrap top-actions mb-4">
        <h3><i class="fa fa-briefcase me-2"></i>Cargos</h3>
        <a href="cargo_index.php?accion=crear" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Nuevo
        </a>
    </div>

    <table id="example" class="table table-striped">
        <thead>
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
                            <div class="acciones">
                                <a href="cargo_index.php?accion=editar&id=<?= $cargo['id'] ?>"
                                   class="btn-editar" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="cargo_index.php?accion=eliminar&id=<?= $cargo['id'] ?>"
                                   class="btn-eliminar" title="Eliminar"
                                   onclick="return confirm('¿Eliminar este cargo?')">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
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

</div>
