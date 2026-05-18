<?php
$empleadoA = 2500;
$empleadoB = 3000;

$bono = 350 * 2;
$meses = 12;

$totalA = ($empleadoA * $meses) + $bono;
$totalB = ($empleadoB * $meses) + $bono;

$total = $totalA + $totalB;

if ($totalA > $totalB) {
    $mayor = "Empleado A";
    $diferencia = $totalA - $totalB;
} elseif ($totalB > $totalA) {
    $mayor = "Empleado B";
    $diferencia = $totalB - $totalA;
} else {
    $mayor = "Ambos ganaron lo mismo";
    $diferencia = 0;
}


echo "---Resultado------" . "\n";
echo "El total del empleado A es:  S/ " . number_format($totalA) . "\n";
echo "El total del empleado B es:  S/ " . number_format($totalB) . "\n";
echo "Bono semestral: S/ $bono (Julio y Diciembre)" . "\n";

echo "Total anual del Empleado A : S/ $totalA" . "\n";
echo "Total anual del Empleado B : S/ $totalB" . "\n";

echo "El total que ha pagado la empresa es de:  S/ " . $total . "\n";

echo "Empleado con mayor ingreso: $mayor" . "\n";
echo "Diferencia de  ingresos: >$diferencia" . "\n";
