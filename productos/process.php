<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombreproducto = $_POST['nombreproducto'];
    $descripcion    = $_POST['descripcion'];
    $precio         = $_POST['precio'];
    $stock          = $_POST['stock'];
    $categoria_id   = $_POST['categoria_id'];
    $proveedor_id   = $_POST['proveedor_id'];

    $stmt = $pdo->prepare("
        INSERT INTO producto 
        (
            nombreproducto,
            descripcion,
            precio,
            stock,
            categoria_id,
            proveedor_id
        )
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $nombreproducto,
        $descripcion,
        $precio,
        $stock,
        $categoria_id,
        $proveedor_id
    ]);

    header("Location: index.php");
    exit();
}

// COMBOBOX
$categorias  = $pdo->query("
    SELECT * FROM view_combo_categorias
")->fetchAll();

$proveedores = $pdo->query("
    SELECT * FROM view_combo_proveedores
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nuevo Producto</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow p-4">

            <!-- TITULO -->
            <h2 class="text-center mb-4">

                <i class="fa-solid fa-box-open"></i>
                Nuevo Producto

            </h2>

            <!-- FORMULARIO -->
            <form action="" method="POST">

                <div class="row g-3">

                    <!-- PRODUCTO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-box"></i>
                            Nombre del Producto

                        </label>

                        <input
                            type="text"
                            name="nombreproducto"
                            class="form-control"
                            required>

                    </div>

                    <!-- DESCRIPCION -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-align-left"></i>
                            Descripción

                        </label>

                        <input
                            type="text"
                            name="descripcion"
                            class="form-control">

                    </div>

                    <!-- PRECIO -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-money-bill-wave"></i>
                            Precio (S/.)

                        </label>

                        <input
                            type="number"
                            name="precio"
                            class="form-control"
                            step="0.01"
                            min="0"
                            required>

                    </div>

                    <!-- STOCK -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-warehouse"></i>
                            Stock

                        </label>

                        <input
                            type="number"
                            name="stock"
                            class="form-control"
                            min="0"
                            required>

                    </div>

                    <!-- CATEGORIA -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-tags"></i>
                            Categoría

                        </label>

                        <select
                            name="categoria_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Categoría
                            </option>

                            <?php foreach ($categorias as $c): ?>

                                <option value="<?= $c['idcategoria'] ?>">

                                    <?= htmlspecialchars($c['nombrecategoria']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- PROVEEDOR -->
                    <div class="col-md-6">

                        <label class="form-label">

                            <i class="fa-solid fa-truck"></i>
                            Proveedor

                        </label>

                        <select
                            name="proveedor_id"
                            class="form-select"
                            required>

                            <option value="">
                                Seleccionar Proveedor
                            </option>

                            <?php foreach ($proveedores as $p): ?>

                                <option value="<?= $p['idproveedor'] ?>">

                                    <?= htmlspecialchars($p['proveedor_label']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- BOTONES -->
                    <div class="col-12 text-center mt-4">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar

                        </button>

                        <a
                            href="index.php"
                            class="btn btn-secondary">

                            <i class="fa-solid fa-arrow-left"></i>
                            Cancelar

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

</body>

</html>