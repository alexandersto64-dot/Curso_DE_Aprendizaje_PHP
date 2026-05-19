<?php
#Contador regresivo
for ($i = 20; $i >= 1; $i--) {
    echo "$i\n";
}
?>
#Sistema de login
<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

if ($usuario == "admin" && $password == "1234") {
    $_SESSION['usuario'] = $usuario;
    header("Location: dashboard.php");
} else {
    echo "Usuario o contraseña incorrecto";
}
