<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM grupo_contacto");
$stmt->execute();

$grupo = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary">

                <i class="fa fa-plus"></i> Nuevo Grupo

            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Grupo</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($grupo as $value): ?>

                        <tr>

                            <td><?php echo $value["id_grupo"]; ?></td>

                            <td><?php echo $value["nombre_grupo"]; ?></td>

                            <td><?php echo $value["fecha_registro"]; ?></td>

                            <td>

                                <button class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </button>

                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i>
                                </button>

                            </td>

                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        </div>

    </div>

</section>