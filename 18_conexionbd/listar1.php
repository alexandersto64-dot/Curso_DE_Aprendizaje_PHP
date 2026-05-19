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

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-lg">

            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Lista de Empleados</h2>
            </div>

            <div class="card-body">

                <?php

                // Consulta
                $sql = "SELECT * FROM view_empleados";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Verificar resultados
                if ($stmt->rowCount() > 0) {

                    echo "
                <div class='table-responsive'>
                    <table class='table table-bordered table-hover table-striped align-middle text-center'>
                        
                        <thead class='table-dark'>
                            <tr>
                                <th>ID Empleado</th>
                                <th>DNI</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Cargo</th>
                            </tr>
                        </thead>

                        <tbody>
                ";

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

</body>

</html>