//Ejemplo 3  Elabora un programa que permita determinar el salario de un 
empleado considerando las horas trabajadas y el monto que gana
por hora, imprimir el total a pagar.

<?php
    //Entrada de datos
    $horas = readline("Ingrese el numero de horas trabajadas: ");
    $montohora = readline ("Ingrese el monto que gana por hora: ");

    //Calculo del salario
    $salario = $horas * $montohora;

    //Ejecucion del programa

    echo "--RESULTADO--\n";
    echo "Horas trabajadas : $horas\n";
    echo "Monto por hora S/: $montohora\n";
    echo "Salario total a pagar: S/ " . number_format($salario, 2). "\n";
?>