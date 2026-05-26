<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM empresa");

$stmt->execute();

$empresa = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-success">
                Agregar Empresa
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
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($empresa as $value): ?>

                        <tr>
                            <td><?php echo $value["id_empresa"]; ?></td>
                            <td><?php echo $value["nombre_empresa"]; ?></td>
                            <td><?php echo $value["direccion"]; ?></td>
                            <td><?php echo $value["telefono"]; ?></td>
                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        </div>

    </div>

</section>