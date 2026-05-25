<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "gestion_empleados";

// Validar nombre BD
if (empty(trim($base_datos))) {
    die("Error: Debes ingresar el nombre de la base de datos.");
}

try {

    // Conexion PDO
    $conn = new PDO(
        "mysql:host=$host;dbname=$base_datos",
        $usuario,
        $contrasena
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empleados</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css" rel="stylesheet">

    <!-- Responsive -->
    <link href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css" rel="stylesheet">

    <!-- Buttons -->
    <link href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.bootstrap5.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="estilo.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-lg">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center flex-wrap gap-2">

                <h2 class="m-0">Lista de Empleados</h2>

                <!-- BOTON NUEVO -->
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalEmpleado">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>

            </div>

            <div class="card-body">

                <?php

                // Consulta
                $sql = "SELECT * FROM view_empleados";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Verificar resultados
                if ($stmt->rowCount() > 0) {

                    echo '
                <div class="table-responsive">

                    <table id="example" class="table table-bordered table-hover table-striped align-middle text-center">
                        
                        <thead class="table-dark">
                            <tr>
                                <th>ID Empleado</th>
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                ';

                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        echo "
                        <tr>
                            <td>{$fila['idempleado']}</td>
                            <td>{$fila['dni']}</td>
                            <td>{$fila['nombres']}</td>
                            <td>{$fila['apellidos']}</td>
                            <td>{$fila['direccion']}</td>
                            <td>{$fila['telefono']}</td>

                            <td>
                                <span class='badge bg-success'>
                                    {$fila['cargo']}
                                </span>
                            </td>

                            <td>

                                <div class='d-flex justify-content-center gap-2'>

                                    <button class='btn btn-warning btn-sm'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </button>

                                    <button class='btn btn-danger btn-sm'>
                                        <i class='fa-solid fa-trash'></i>
                                    </button>

                                </div>

                            </td>

                        </tr>
                    ";
                    }

                    echo "
                        </tbody>
                    </table>
                </div>
                ";
                } else {

                    echo "
                <div class='alert alert-warning text-center'>
                    No se encontraron empleados.
                </div>
                ";
                }

                ?>

            </div>

        </div>

    </div>

    <!-- MODAL NUEVO EMPLEADO -->
    <div class="modal fade" id="modalEmpleado" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title">
                        <i class="fa-solid fa-user-plus"></i>
                        Registrar Empleado
                    </h5>

                    <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                    </button>

                </div>

                <form action="" method="POST">

                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    <i class="fa-solid fa-id-card text-primary"></i>
                                    DNI
                                </label>

                                <input type="text"
                                    name="dni"
                                    class="form-control"
                                    placeholder="Ingrese DNI" require>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    <i class="fa-solid fa-phone text-success" require></i>
                                    Teléfono
                                </label>

                                <input type="text"
                                    name="telefono"
                                    class="form-control"
                                    placeholder="Ingrese teléfono" require>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    <i class="fa-solid fa-user text-info" require></i>
                                    Nombres
                                </label>

                                <input type="text"
                                    name="nombres"
                                    class="form-control"
                                    placeholder="Ingrese nombres" require>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    <i class="fa-solid fa-user-tag text-warning"></i>
                                    Apellidos
                                </label>

                                <input type="text"
                                    name="apellidos"
                                    class="form-control"
                                    placeholder="Ingrese apellidos" require>

                            </div>

                            <div class="col-12">

                                <label class="form-label">
                                    <i class="fa-solid fa-location-dot text-danger"></i>
                                    Dirección
                                </label>

                                <input type="text"
                                    name="direccion"
                                    class="form-control"
                                    placeholder="Ingrese dirección" require>

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">
                                    <i class="fa-solid fa-briefcase text-secondary"></i>
                                    Cargo
                                </label>

                                <select name="cargo_id" class="form-select">

                                    <option value="">Seleccione Cargo</option>

                                    <?php
                                    $cargo = $conn->query("SELECT * FROM cargo");

                                    while ($row = $cargo->fetch(PDO::FETCH_ASSOC)) {
                                        echo "
                                            <option value='{$row['id']}'>
                                                {$row['nombrecargo']}
                                            </option>
                                        ";
                                    }
                                    ?>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">

                            <i class="fa-solid fa-xmark"></i>
                            Cerrar

                        </button>

                        <button type="submit"
                            class="btn btn-primary">

                            <i class="fa-solid fa-floppy-disk"></i>
                            Guardar Empleado

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>

    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>

    <!-- Responsive -->
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.bootstrap5.js"></script>

    <!-- Excel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

    <!-- PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- Print -->
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

    <!-- JS PERSONALIZADO -->
    <script src="java.js"></script>

</body>

</html>