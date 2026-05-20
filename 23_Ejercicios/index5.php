//Ejercicio 3: Venta de productos
<?php
    $num1 = 15;
    $num2 = 20;

    $precio1 = 3200;
    $precio2 = 80;

    $totallap = $num1 * $precio1;
    $totaltec = $num2 * $precio2;
    $montototal = $totallap + $totaltec;

    echo "---Resultados de la venta---\n";
    echo "El total de laptops vendidas es de: S/ " . number_format($totallap, 2). "\n";
    echo "El total de teclados vendidas es de: S/ " . number_format($totaltec, 2). "\n";
    echo "El monto total de ventas es de: S/ " . number_format($montototal, 2). "\n";

?>