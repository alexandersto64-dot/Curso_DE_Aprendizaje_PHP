<?php

include "../modelo/conexion.php";

if (!empty($_GET["id"])) {

    $id = $_GET["id"];

    $sql = $conexion->query("DELETE FROM empleado WHERE id_persona=$id");

    if ($sql == 1) {

    header("Location: ../index.php?mensaje=eliminado");
    } else {

        echo "Error al eliminar";
    }
}
?>