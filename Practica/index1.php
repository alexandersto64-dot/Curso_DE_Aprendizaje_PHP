# Calculadora basica
<?php
$num1 = readline("Ingrese el primer numero: ");
$num2 = readline("Ingrese el segundo numero: ");
$operacion = readline("¿Que operacion desea hacer (sumar=1 , restar=2 , multiplicar=3 , dividir=4)?:  ");

switch ($operacion){
    case 1:
        $procedimiento = $num1 + $num2;
        echo "La suma es de: " . $procedimiento . PHP_EOL;
        break;
    case 2:
        $procedimiento = $num1 - $num2;
        echo "La resta es de: " . $procedimiento . PHP_EOL;
        break;
    case 3:
        $procedimiento = $num1 * $num2;
        echo "La multiplicacion es de: " . $procedimiento . PHP_EOL;
        break;
    case 4:
        $procedimiento = $num1 / $num2;
        echo "La divion es de: " . $procedimiento . PHP_EOL;
        break;  
    default:
        echo "Numero invalido". PHP_EOL;
                   
}

