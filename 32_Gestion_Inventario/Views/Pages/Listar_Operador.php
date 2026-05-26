<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM operador");
$stmt->execute();

$operadores = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOperador">

                <i class="fa fa-plus"></i> Nuevo Operador

            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Operador</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($operadores as $value): ?>

                        <tr>

                            <td><?php echo $value["id_operador"]; ?></td>

                            <td><?php echo $value["nombre_operador"]; ?></td>

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

<!-- MODAL -->

<div id="modalAgregarOperador" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title">
                        <i class="fa fa-phone"></i> Nuevo Operador
                    </h4>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>ID Operador</label>

                        <input type="text" class="form-control" name="id_operador">

                    </div>

                    <div class="form-group">

                        <label>Nombre Operador</label>

                        <input type="text" class="form-control" name="nombre_operador">

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Guardar
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>