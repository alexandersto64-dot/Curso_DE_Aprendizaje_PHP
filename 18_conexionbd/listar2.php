<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "gestion_alumnos";

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
    <title>Lista de Alumnos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" ;
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.bootstrap5.css" ;
        </head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow-lg">

            <div class="card-header bg-success text-white">
                <h2 class="text-center">Lista de Alumnos</h2>
            </div>

            <div class="card-body">

                <?php

                // Consulta
                $sql = "SELECT * FROM view_alumnos";

                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // Obtener resultados
                $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Verificar resultados
                if (count($alumnos) > 0) {

                    echo "
                    <div class='table-responsive'>

                        <table id='example'class='table table-bordered table-hover table-striped align-middle text-center'>

                            <thead class='table-dark'>
                                <tr>
                                    <th>ID</th>
                                    <th>DNI</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Carrera</th>
                                    <th>Curso</th>
                                    <th>Ciclo</th>
                                    <th>Promedio</th>
                                </tr>
                            </thead>

                            <tbody>
                    ";

                    foreach ($alumnos as $fila) {

                        echo "
                            <tr>
                                <td>{$fila['idalumno']}</td>
                                <td>{$fila['dni']}</td>
                                <td>{$fila['nombres']}</td>
                                <td>{$fila['apellidos']}</td>
                                <td>{$fila['telefono']}</td>

                                <td>
                                    <span class='badge bg-primary'>
                                        {$fila['nombrecarrera']}
                                    </span>
                                </td>

                                <td>{$fila['nombrecurso']}</td>

                                <td>
                                    <span class='badge bg-warning text-dark'>
                                        {$fila['nombreciclo']}
                                    </span>
                                </td>

                                <td>
                                    <span class='badge bg-success'>
                                        {$fila['promedio']}
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
                        No se encontraron alumnos.
                    </div>
                    ";
                }

                ?>

            </div>

        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.bootstrap5.js"></script>

    <script>
        new DataTable('#example');
    </script>
</body>

</html>