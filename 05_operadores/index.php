<?php 
//Ejemplo 1:
$a = 10;
$b = 5;

$suma = $a + $b;
$resta = $a - $b;
$multiplicacion = $a * $b;
$division = $a / $b;
$modulo = $a % $b;

echo "Suma: " . $suma . "<br>";
echo "Resta: " . $resta . "<br>";
echo "Multiplicacion: " . $multiplicacion . "<br>";
echo "Division: " . $division . "<br>";
echo "Modulo: " . $modulo . "<br>";
?>

//Ejemplo 2: Operaciones basicas ingresando valores por teclado
<?php
    //Leer numeros desde el teclado
    $num1 = (int) readline ("Ingrese el primer numero:");
    $num2 = (int) readline ("Ingrese el segundo  numero:");

    //Operaciones basicas
    $suma = $num1 + $num2;
    $resta = $num1 - $num2;
    $multiplicacion = $num1 * $num2;

    //Validamos division por cero
    if ($num2 != 0){
        $division = $num1 / $num2;
    } else {
        $division = "No se puede dividir por cero";
    }

    //Mostrar resultados
    echo "Resultados: \n";
    echo "La Suma es: $num1 + $num2 = $suma\n";
    echo "La Resta es: $num1 - $num2 = $resta\n";
    echo "La Multiplicacion es: $num1 * $num2 = $multiplicacion\n";
    echo "La Division es: $num1 / $num2 = $division\n";
?>

//Ejemplo 3: Operadores de comparacion
<?php 
    $Igual =  ($a == $b);
    $Distinto = ($a != $b);
    $MayorQue = ($a > $b);
    $MenorQue = ($a < $b);
    $MayorIgual = ($a >= $b);
    $MenorIgual = ($a <= $b);

    echo "Es Igual: " . ($Igual ? "Si" : "No") . "\n";
    echo "Es Distinto: " . ($Distinto ? "Si" : "No") . "\n";
    echo "Es MayorQue: " . ($MayorQue ? "Si" : "No") . "\n";
    echo "Es MenorQue: " . ($MenorQue ? "Si" : "No") . "\n";
    echo "Es MayorIgual: " . ($MayorIgual ? "Si" : "No") . "\n";
    echo "Es MenorIgual: " . ($MenorIgual ? "Si" : "No") . "\n";

?>

//Ejemplo 4: Operadores logicos
<?php 
    $yLogico = ($a > 5 && $b < 10); 
    $oLogico = ($a > 5 || $b < 3);
    $noLogico =  !($a == $b);

    echo "Y Logico: ". ($yLogico ? "Si" : "No") . "\n";
    echo "O Logico: ". ($oLogico ? "Si" : "No") . "\n";
    echo "Negacion: ". ($noLogico ? "Si" : "No") . "\n";
?>

//Ejemplo 5: Operadores de asignacion
<?php
    $c =10;
    $c += 5;  // c = c + 5
    $c -= 3;  // c = c - 3
    $c *= 2;  // c = c * 2
    $c /= 4;  // c = c / 4    

    echo "Valor de c despues de las operaciones: " . $c . "\n";
?>
// Ejemplo 6: Operadores de incremento y decremento
<?php
    $d = 5;
    echo "d antes del incremento: $d\n";
    echo "d despues del incremento: " . ++$d . "\n"; // Pre-incremento
    echo "d despues del decremento: " . --$d . "\n"; // Pre-decremento
?>

