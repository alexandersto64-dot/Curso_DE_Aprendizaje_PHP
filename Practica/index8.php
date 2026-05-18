#Validar contraseña

<?php 
$clavecorrecta = 1234;
$clave = "";

do {
    $clave = readline("Ingrese la contraseña: ");

}  while ($clave != $clavecorrecta);
echo "Contraseña correcta";