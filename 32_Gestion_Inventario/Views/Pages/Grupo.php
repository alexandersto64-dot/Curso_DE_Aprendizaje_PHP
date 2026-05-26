<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM grupo_contacto");

$stmt->execute();

$grupo = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-danger">
                Agregar Grupo
            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Fecha Registro</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($grupo as $value): ?>

                        <tr>
                            <td><?php echo $value["id_grupo"]; ?></td>
                            <td><?php echo $value["nombre_grupo"]; ?></td>
                            <td><?php echo $value["fecha_registro"]; ?></td>
                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        </div>

    </div>

</section>