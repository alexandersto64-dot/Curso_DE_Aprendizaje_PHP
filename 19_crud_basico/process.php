<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtener datos
    $dni = trim($_POST['dni']);
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $direccion = trim($_POST['direccion']);
    $telefono = trim($_POST['telefono']);
    $cargo_id = trim($_POST['cargo_id']);

    // Validar campos vacíos
    if (
        empty($dni) ||
        empty($nombres) ||
        empty($apellidos) ||
        empty($direccion) ||
        empty($telefono) ||
        empty($cargo_id)
    ) {

        echo "
        <script>
            alert('Completa todos los campos');
            window.location='index.php';
        </script>
        ";

        exit();
    }

    // Insertar empleado
    $stmt = $pdo->prepare("
        INSERT INTO empleado 
        (dni, nombres, apellidos, direccion, telefono, cargo_id)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $resultado = $stmt->execute([
        $dni,
        $nombres,
        $apellidos,
        $direccion,
        $telefono,
        $cargo_id
    ]);

    // Verificar si se guardó
    if ($resultado) {

        echo "
        <script>
            alert('Empleado guardado correctamente');
            window.location='index.php';
        </script>
        ";
    } else {

        echo "
        <script>
            alert('Error al guardar empleado');
            window.location='index.php';
        </script>
        ";
    }
}
