<?php
if (!empty($_POST["btnmodificar"])) {

    if (
        !empty($_POST["dni"]) &&
        !empty($_POST["nombres"]) &&
        !empty($_POST["apellidos"]) &&
        !empty($_POST["fecha_nac"]) &&
        !empty($_POST["correo"]) &&
        !empty($_POST["telefono"])
    ) {

        $id         = $_POST["id"];
        $dni        = $_POST["dni"];
        $nombres    = $_POST["nombres"];
        $apellidos  = $_POST["apellidos"];
        $fecha_nac  = $_POST["fecha_nac"];
        $correo     = $_POST["correo"];
        $telefono   = $_POST["telefono"];

        $sql = $conexion->query("
            UPDATE empleado SET
            dni='$dni',
            nombres='$nombres',
            apellidos='$apellidos',
            fecha_nac='$fecha_nac',
            correo='$correo',
            telefono='$telefono'
            WHERE id_persona=$id
        ");

        if ($sql == 1) {

    header("location:index.php?mensaje=modificado");

        } else {

            echo '<div class="alert alert-danger">Error al modificar</div>';
        }

    } else {

        echo '<div class="alert alert-warning">Alguno de los campos está vacío</div>';
    }
}
?>