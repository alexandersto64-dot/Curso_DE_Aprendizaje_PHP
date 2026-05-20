<?php   
include "modelo/conexion.php";
$id=$_GET["id"];
$sql = $conexion->query("SELECT * FROM empleado WHERE id_persona='$id'");
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modificar Empleado</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/9fe0e872ab.js" crossorigin="anonymous"></script>

    <style>

        body{
            background: linear-gradient(to right, #eef2f7, #d9e7ff);
            min-height: 100vh;
        }

        .card{
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .card-header{
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .titulo{
            font-weight: bold;
        }

        .form-control{
            border-radius: 10px;
        }

        .btn{
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn:hover{
            transform: scale(1.03);
        }

        .icono{
            color: #0d6efd;
            margin-right: 5px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="card shadow-lg col-lg-6 mx-auto">

        <div class="card-header">

            <h3 class="titulo">
                <i class="fa-solid fa-user-pen"></i>
                Modificar Empleado
            </h3>
            <!-- para capturar el id del empleado a modificar -->
             <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        </div>

        <div class="card-body p-4">

            <form method="POST">

                <!-- ID OCULTO -->
                <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

                <?php
                include "controlador/modificar_empleado.php";
                while ($datos = $sql->fetch_object()) {
                ?>
                <!-- DNI -->
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-id-card icono"></i>
                        N° de DNI
                    </label>

                    <input type="number"
                           class="form-control"
                           name="dni"
                           value="<?=$datos->dni?>">

                </div>

                <!-- NOMBRES -->
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-user icono"></i>
                        Nombres
                    </label>

                    <input type="text"
                           class="form-control"
                           name="nombres"
                           value="<?=$datos->nombres?>">

                </div>

                <!-- APELLIDOS -->
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-user-tag icono"></i>
                        Apellidos
                    </label>

                    <input type="text"
                           class="form-control"
                           name="apellidos"
                           value="<?=$datos->apellidos?>">

                </div>

                <!-- FECHA -->
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-calendar icono"></i>
                        Fecha Nacimiento
                    </label>

                    <input type="date"
                           class="form-control"
                           name="fecha_nac"
                           value="<?=$datos->fecha_nac?>">

                </div>

                <!-- CORREO -->
                <div class="mb-3">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-envelope icono"></i>
                        Correo
                    </label>

                    <input type="email"
                           class="form-control"
                           name="correo"
                           value="<?=$datos->correo?>">

                </div>

                <!-- TELEFONO -->
                <div class="mb-4">

                    <label class="form-label fw-bold">
                        <i class="fa-solid fa-phone icono"></i>
                        Teléfono
                    </label>

                    <input type="number"
                           class="form-control"
                           name="telefono"
                           value="<?=$datos->telefono?>">

                </div>
                <?php 
                }
                ?>



                <!-- BOTONES -->
                <div class="d-flex justify-content-center gap-3">

                    <button type="submit"
                            class="btn btn-primary px-4"
                            name="btnmodificar"
                            value="ok">

                        <i class="fa-solid fa-floppy-disk"></i>
                        Modificar

                    </button>

                    <a href="index.php"
                       class="btn btn-secondary px-4">

                        <i class="fa-solid fa-arrow-left"></i>
                        Volver

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>