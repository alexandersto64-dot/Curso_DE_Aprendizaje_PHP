<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM empresa");
$stmt->execute();

$empresa = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalEmpresa">

                <i class="fa fa-plus"></i> Nueva Empresa

            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Empresa</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($empresa as $value): ?>

                        <tr>

                            <td><?php echo $value["id_empresa"]; ?></td>
                            <td><?php echo $value["nombre_empresa"]; ?></td>
                            <td><?php echo $value["direccion"]; ?></td>
                            <td><?php echo $value["telefono"]; ?></td>

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