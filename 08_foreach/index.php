<?php

$frutas = ["Manzana", "Banana", "Cereza", "Uva"];
?>
<?php
$frutas = ["Manzana", "Banana", "Cereza", "Uva"];

foreach ($frutas as $fruta) {
    echo "Fruta:  $fruta\n";
}
?>
# Ejemplo 2
<?php
$colores = array("Rojo", "Verde", "Azul", "Amarillo");

foreach ($colores as $color) {
    echo "Color: " . $color . "\n";
}
?>
#Ejemplo 3
<?php
$persona = array(
    "nombre" => "Juan",
    "apellido" => "perez",
    "edad" => 30
);

foreach ($persona as $clave => $valor) {
    echo $clave . ": " . $valor . "\n";
}
?>