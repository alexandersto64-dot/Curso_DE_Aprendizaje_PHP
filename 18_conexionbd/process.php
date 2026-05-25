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

    // VALIDAR CAMPOS VACÍOS
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
            history.back();
        </script>
        ";

        exit();
    }

    // VALIDAR DNI
    if (!preg_match('/^[0-9]{8}$/', $dni)) {

        echo "
        <script>
            alert('El DNI debe contener exactamente 8 números');
            history.back();
        </script>
        ";

        exit();
    }

    // VALIDAR TELÉFONO
    if (!preg_match('/^[0-9]{9}$/', $telefono)) {

        echo "
        <script>
            alert('El teléfono debe contener exactamente 9 números');
            history.back();
        </script>
        ";

        exit();
    }

    // VALIDAR DNI DUPLICADO
    $verificar = $conn->prepare("
        SELECT * FROM empleado 
        WHERE dni = ?
    ");

    $verificar->execute([$dni]);

    if ($verificar->rowCount() > 0) {

        echo "
        <script>
            alert('El DNI ya está registrado');
            history.back();
        </script>
        ";

        exit();
    }

    // INSERTAR EMPLEADO
    $stmt = $conn->prepare("
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

    // MENSAJES
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
            history.back();
        </script>
        ";
    }
}
