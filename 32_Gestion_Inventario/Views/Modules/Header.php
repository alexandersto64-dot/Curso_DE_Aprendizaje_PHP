<header class="main-header">

<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

/* =========================
   VALIDACIÓN SEGURA
========================= */

if(!isset($_SESSION["usuario"])){
    // si no hay sesión, evita errores
    header("Location: index.php");
    exit;
}

/* =========================
   FOTO SEGURA
   (evita imagen "pegada")
========================= */

$foto = $_SESSION["foto"] ?? "Views/Images/Users/default.jpg";

// evita caché del navegador (clave para cambios de usuario)
$foto .= "?v=" . time();

$nombre = $_SESSION["nombre"] ?? "";
$rol    = $_SESSION["rol"] ?? "";
?>

    <!-- LOGO -->
    <a href="index.php" class="logo">

        <span class="logo-mini"><b>A</b>26</span>

        <span class="logo-lg"><b>Agenda</b>2026</span>

    </a>

    <!-- NAVBAR -->
    <nav class="navbar navbar-static-top">

        <!-- SIDEBAR -->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- USER -->
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="<?= $foto ?>"
                             class="user-image"
                             alt="Usuario">

                        <span class="hidden-xs">
                            <?= htmlspecialchars($nombre) ?>
                        </span>

                    </a>

                    <!-- DROPDOWN -->
                    <ul class="dropdown-menu">

                        <li class="user-header bg-light-blue">

                            <img src="<?= $foto ?>"
                                 class="img-circle"
                                 alt="Usuario">

                            <p>

                                <?= htmlspecialchars($nombre) ?>

                                <small>
                                    <?= htmlspecialchars($rol) ?>
                                </small>

                            </p>

                        </li>

                        <li class="user-footer">

                            <div class="pull-left">
                                <a href="#" class="btn btn-primary btn-flat">
                                    Perfil
                                </a>
                            </div>

                            <div class="pull-right">
                                <a href="logout.php" class="btn btn-danger btn-flat">
                                    Cerrar Sesión
                                </a>
                            </div>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</header>