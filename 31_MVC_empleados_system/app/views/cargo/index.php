<?php include '../app/views/layout/header.php'; ?>

<div class="container-box">

    <div class="d-flex justify-content-between align-items-center flex-wrap top-actions mb-4">
        <h3><i class="fa fa-briefcase me-2"></i>Cargos</h3>
        <a href="?controller=cargo&action=create" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Nuevo Cargo
        </a>
    </div>

    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($cargos)): ?>
                <?php foreach($cargos as $cargo): ?>
                    <tr>
                        <td><?= $cargo['idcargo'] ?></td>
                        <td><?= htmlspecialchars($cargo['nombrecargo']) ?></td>
                        <td>
                            <div class="acciones">
                                <a href="?controller=cargo&action=edit&idcargo=<?= $cargo['idcargo'] ?>"
                                   class="btn-editar" title="Editar">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="?controller=cargo&action=delete&idcargo=<?= $cargo['idcargo'] ?>"
                                   class="btn-eliminar" title="Eliminar"
                                   onclick="return confirm('¿Eliminar cargo?');">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">
                        <i class="fas fa-info-circle me-1"></i> No hay cargos registrados.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?php include '../app/views/layout/footer.php'; ?>
