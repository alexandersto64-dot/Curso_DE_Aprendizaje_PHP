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
?>
#Conversor de monedas


<?php
$num1 = readline("Ingrese el primer numero de soles que se convertira: ");
$operacion = readline("¿Que operacion desea hacer (dolar=1 , euro=2 , pesos=3 )?:  ");   
    $dolar = 3.41;
    $euro = 4;
    $pesos = 2.3;

    switch ($operacion){
        case 1:
            $resultado = $num1 * $dolar;
            echo "De soles a dolar es de: $/". $resultado . "\n";
            break;
        case 2:
            $resultado = $num1 * $euro;
            echo "De soles a euro es de: $/". $resultado . "\n";            
            break;
        case 3:
            $resultado = $num1 * $pesos;
            echo "De soles a pesos es de: $/". $resultado . "\n";
            break; 
        default: 
            echo "Numero invalido" . "\n";                       
            
    }
?>
