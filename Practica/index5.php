#Sistema de descuentos

<?php
$num1 = readline("Ingresa el precio del producto: ");
$descuento1 = 0.10;
$descuento2 = 0.20;

if ($num1 >500){
    $resultado = $num1 * $descuento2;
} elseif ($num1 >100){
    $resultado = $num1 * $descuento1;
} else {
    $resultado =0;
}
$total = $num1 - $resultado;

echo "Precio: S/ ". $num1 . "\n";
echo "Descuento: S/ ". $resultado . "\n";
echo "Total a pagar : S/ ". $total . "\n";

