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
?>

#Sistema de notas múltiples
<?php
$notas = array (15,16,17,18,19);
$suma = array_sum($notas);

$contar = count($notas);

$promedio = $suma / $contar;

echo "Suma total: " . $suma . "\n";
echo "Contar total: " . $contar  . "\n";
echo "Promedio final : " . $promedio  . "\n";



