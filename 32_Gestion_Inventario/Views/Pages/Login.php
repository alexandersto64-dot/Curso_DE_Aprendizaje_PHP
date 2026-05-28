<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

/* =========================
   CREAR TOKEN CSRF
========================= */

if(empty($_SESSION["token"])){
    $_SESSION["token"] = bin2hex(random_bytes(32));
}

?>

<div class="login-box">

    <div class="login-logo">
        <b>Agenda</b>2026
    </div>

    <div class="login-box-body">

        <p class="login-box-msg">Iniciar Sesión</p>

        <form method="POST">

            <!-- TOKEN CSRF -->
            <input type="hidden"
                   name="token"
                   value="<?= $_SESSION["token"] ?>">

            <!-- USUARIO -->
            <div class="form-group has-feedback">
                <input type="text"
                       class="form-control"
                       name="usuario"
                       placeholder="Usuario"
                       required>

                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <!-- PASSWORD -->
            <div class="form-group has-feedback">
                <input type="password"
                       class="form-control"
                       name="password"
                       placeholder="Contraseña"
                       required>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <button type="submit"
                    class="btn btn-primary btn-block">
                Ingresar
            </button>

        </form>

        <?php

        require_once "Controllers/login.Controller.php";

        $login = new LoginController();
        $login->ctrIngreso();

        ?>

    </div>
</div>