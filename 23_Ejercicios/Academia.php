// Ejercicio 1: Pago anual de profesores
<?php
    $profe1 = 1800;
    $profe2 = 2200;
    $meses= 12;
    $bono = 500;

    $sueldo1 = ($profe1 * $meses) +$bono;
    $sueldo2 = ($profe2 * $meses) + $bono;
    $total = $sueldo1 + $sueldo2;
    
    echo "----RESULTADOS----\n";
    echo "El pago anual del profesor A es de S/ : " . number_format($sueldo1, 2) . "\n"; 
    echo "El pago anual del profesor B es de S/ : " . number_format($sueldo2, 2) . "\n"; 
    echo "El pago total de a academia es de S/ : " . number_format($total, 2) . "\n"; 

?>