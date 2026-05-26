<?php

require_once "Models/Conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM vista_contactos");

$stmt->execute();

$contactos = $stmt->fetchAll();

?>

<section class="content">

    <div class="box">

        <div class="box-header with-border">

            <button class="btn btn-warning">
                Agregar Contacto
            </button>

        </div>

        <div class="box-body">

            <table class="table table-bordered table-striped tablaData">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Empresa</th>
                        <th>Operador</th>
                        <th>Grupo</th>
                        <th>Celular</th>
                        <th>Correo</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($contactos as $value): ?>

                        <tr>

                            <td><?php echo $value["id_contacto"]; ?></td>
                            <td><?php echo $value["nombres"]; ?></td>
                            <td><?php echo $value["apellidos"]; ?></td>
                            <td><?php echo $value["nombre_empresa"]; ?></td>
                            <td><?php echo $value["nombre_operador"]; ?></td>
                            <td><?php echo $value["nombre_grupo"]; ?></td>
                            <td><?php echo $value["telefono_movil"]; ?></td>
                            <td><?php echo $value["correo"]; ?></td>

                        </tr>

                    <?php endforeach ?>

                </tbody>

            </table>

        </div>

    </div>

</section>