<?php
$presupuesto = 1000;
echo "Ingrese el precio del producto A: ";
$A = readline();
echo "Ingrese el precio del producto B: ";
$B = readline();
echo "Ingrese el precio del producto C: ";
$C = readline();
echo "Ingrese el precio del producto D: ";
$D = readline();
echo "Ingrese el precio del producto E: ";
$E = readline();
echo "Ingrese el precio del producto F: ";
$F = readline();

$total = $A + $B + $C + $D + $E + $F;

$sobrante = $presupuesto - $total;

echo "\n ===========================\n";
echo "            BOLETA DE COMPRA \n";
echo "\n ===========================\n";
echo "Producto A: S/ $A \n";
echo "Producto B: S/ $B \n";
echo "Producto C: S/ $C \n";
echo "Producto D: S/ $D \n";
echo "Producto E: S/ $E \n";
echo "Producto F: S/ $F \n";
echo "Total a pagar : S/ $total\n";
echo "Presupuesto disponible: S/ $sobrante\n";

if ($total <= $presupuesto) {
    echo "Compra realizada con exito. \n";
    echo "Le sobra : S/ $sobrante\n";
} else {
    $faltante = $total - $presupuesto;
    echo "Atencion Se paso del presupuesto. \n";
    echo "Le falta: S/ $faltante\n";
}
