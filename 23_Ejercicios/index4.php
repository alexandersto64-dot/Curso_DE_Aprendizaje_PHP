// Ejercicio 2: Sueldo con horas extras

<?php

$sueldoMensual = (float) readline("Ingrese sueldo mensual: ");

$horasExtras = (int) readline("Ingrese horas extras trabajadas: ");

$pagoHoraExtra = 20;

$meses = 12;

// Pago por horas extras
$totalExtras = $horasExtras * $pagoHoraExtra;

// Pago mensual
$pagoMensual = $sueldoMensual + $totalExtras;

// Pago anual
$pagoAnual = $pagoMensual * $meses;

// Resultados
echo "\n------ RESULTADOS ------\n";

echo "Pago por horas extras: S/ " . number_format($totalExtras, 2) . "\n";

echo "Pago mensual total: S/ " . number_format($pagoMensual, 2) . "\n";

echo "Pago anual total: S/ " . number_format($pagoAnual, 2) . "\n";

?>