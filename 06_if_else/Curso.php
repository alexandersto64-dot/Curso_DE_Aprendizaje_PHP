<?php
$nombre = readline("Ingrese el nombre del alumno: ");
$curso = readline("Ingrese el nombre del curso: ");

$nota1 = readline("Ingrese la nota 1: ");
$nota2 = readline("Ingrese la nota 2: ");
$nota3 = readline("Ingrese la nota 3: ");
$nota4 = readline("Ingrese la nota 4: ");

$resultado = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
echo "--Resultado---";
echo "Nombre: " . $nombre . "\n";
echo "El promedio es: " . $resultado . "\n";
if ($resultado > 10) {
    echo "Esta aprobado";
} else {
    echo "Esta desaprobado";
}
