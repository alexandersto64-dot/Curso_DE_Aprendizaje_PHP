<?php

if (!empty($_POST["btnregistrar"])) {

    if (
        !empty($_POST["dni"]) &&
        !empty($_POST["nombres"]) &&
        !empty($_POST["apellidos"]) &&
        !empty($_POST["fechanacimiento"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["telefono"])
    ) {

        $dni        = $_POST["dni"];
        $nombres    = $_POST["nombres"];
        $apellidos  = $_POST["apellidos"];
        $fecha_nac  = $_POST["fechanacimiento"];
        $correo     = $_POST["correo"];
        $telefono   = $_POST["telefono"];

        // VALIDAR DNI REPETIDO
        $verificar = $conexion->query("SELECT * FROM empleado WHERE dni='$dni'");

        if ($verificar->num_rows > 0) {

            echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 El DNI ya está registrado.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            ';

        } else {

            // INSERTAR
            $sql = $conexion->query("
                INSERT INTO empleado
                (dni, nombres, apellidos, fecha_nac, correo, telefono)
                VALUES
                ('$dni','$nombres','$apellidos','$fecha_nac','$correo','$telefono')
            ");

            if ($sql == 1) {

                // REDIRECCIONAR
                header("Location: index.php?mensaje=registrado");
                exit();

            } else {

                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Error al registrar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                ';
            }
        }

    } else {

        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
             Todos los campos son obligatorios.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        ';
    }
}
?>