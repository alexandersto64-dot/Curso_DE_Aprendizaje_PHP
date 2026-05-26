<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM operador");

$stmt->execute();

$operadores = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary">
                Agregar Operador
            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Operador</th>
                        <th>Fecha Registro</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($operadores as $key => $value): ?>

                        <tr>

                            <td><?php echo $value["id_operador"]; ?></td>

                            <td><?php echo $value["nombre_operador"]; ?></td>

                            <td><?php echo $value["fecha_registro"]; ?></td>

                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        </div>

    </div>

</section>