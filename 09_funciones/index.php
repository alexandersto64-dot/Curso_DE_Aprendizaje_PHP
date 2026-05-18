#Ejemplo 1
<?php

function saludar($nombre)
{
    return "Hola, $nombre!";
}
echo saludar("Juan") . "\n";
?>
#Ejemplo 2
<?php
function sumar($a, $b)
{
    return $a + $b;
}
$resultado = sumar(5, 7);
echo "La suma de 5 y 7 es de: " . $resultado . "\n";
?>

#Ejemplo 3
<?php
function multiplicar($a, $b)
{
    return $a * $b;
}
$resultado = multiplicar(5, 7);
echo "La multiplicacion de 5 y 7 es de: " . $resultado . "\n";
?>
#Ejemplo 2
<?php
function restar($a, $b)
{
    return $a - $b;
}
$resultado = restar(5, 7);
echo "La resta de 5 y 7 es de: " . $resultado . "\n";
?>

#Ejemplo 3
<?php
function dividir($a, $b)
{
    return $a / $b;
}
$resultado = dividir(10, 5);
echo "La division de 10 y 5 es de: " . $resultado . "\n";
?>