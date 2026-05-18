<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="login-container">

        <div class="login-box">

            <h2>Bienvenido</h2>
            <p>Inicia sesión para continuar</p>

            <form action="validar_php.php" method="POST">

                <div class="input-group">
                    <input
                        type="text"
                        name="usuario"
                        placeholder="Usuario"
                        required>
                </div>

                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        placeholder="Contraseña"
                        required>
                </div>

                <button type="submit">
                    Ingresar
                </button>

            </form>

        </div>

    </div>

</body>

</html>