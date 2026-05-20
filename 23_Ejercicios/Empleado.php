//Ejemplo04: pago total de empleados en un año 

<?php
    //Entrada de datos
    $num1 = 2500;
    $num2 = 3000;
    $beneficio = 350 * 2; // Beneficio por mes
    $meses = 12;

    $suma1 = ($num1 * $meses) + $beneficio;
    $suma2 = ($num2 * $meses) + $beneficio;
    $total = $suma1 + $suma2;

    echo "-------RESULTADO-------\n";
    echo "Al empleado A se le debe pagar: S/ ". number_format($suma1, 2) . " anualmente\n";
    echo "Al empleado B se le debe pagar: S/ ". number_format($suma2, 2) . " anualmente\n";
    echo "La empresa debe pagar en total: S/ ". number_format($total, 2) . " anualmente\n";
?>