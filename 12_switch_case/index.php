<?php
$color = "rojo";
switch ($color) {
    case "rojo":
        echo "Ejemplo 1: El color es rojo\n";
    case "azul":
        echo "Ejemplo 2: El color es azul\n";
    case "amarillo":
        echo "Ejemplo 3: El color es amarillo\n";
    default:
        echo   "Ejemplo 4: Color no encontrado\n";
}
?>


<?php
#Implemanta un programa q permita hacer lo siguiente :
# el numero de la semana el usuario debe ingresarlo por teclado
# utiliza el case y break para evaluar aquel dia corresponde.
$semana = readline("Ingresa el numero de la semana: ");
switch ($semana) {
    case 1:
        echo "EL dia de la semana es Lunes\n";
        break;
    case 2:
        echo "EL dia de la semana es Martes\n";
        break;
    case 3:
        echo "EL dia de la semana es Miercoles\n";
        break;
    case 4:
        echo "EL dia de la semana es Jueves\n";
        break;
    case 5:
        echo "EL dia de la semana es Viernes\n";
        break;
    case 6:
        echo "EL dia de la semana es Sabado\n";
        break;
    case 7:
        echo "EL dia de la semana es Domingo\n";
        break;
    default:
        echo   "Numero de dia invalido\n";
}
?>
<?php

// Solicitar primer número
echo "Ingrese el primer numero: ";
$numero1 = (float) trim(fgets(STDIN));

// Solicitar segundo número
echo "Ingrese el segundo numero: ";
$numero2 = (float) trim(fgets(STDIN));

// Solicitar operación
echo "Ingrese la operacion (sumar, restar, multiplicar, dividir, modulo): ";
$operacion = trim(fgets(STDIN));

// Evaluar operación
switch ($operacion) {

    case "1":
        $resultado = $numero1 + $numero2;
        echo "El resultado de sumar $numero1 y $numero2 es: $resultado" . PHP_EOL;
        break;

    case "2":
        $resultado = $numero1 - $numero2;
        echo "El resultado de restar $numero1 y $numero2 es: $resultado" . PHP_EOL;
        break;

    case "3":
        $resultado = $numero1 * $numero2;
        echo "El resultado de multiplicar $numero1 y $numero2 es: $resultado" . PHP_EOL;
        break;

    case "4":

        if ($numero2 != 0) {
            $resultado = $numero1 / $numero2;
            echo "El resultado de dividir $numero1 y $numero2 es: $resultado" . PHP_EOL;
        } else {
            echo "Error: no se puede dividir entre cero." . PHP_EOL;
        }

        break;

    case "5":

        if ($numero2 != 0) {
            $resultado = $numero1 % $numero2;
            echo "El resultado del modulo entre $numero1 y $numero2 es: $resultado" . PHP_EOL;
        } else {
            echo "Error: no se puede calcular modulo entre cero." . PHP_EOL;
        }

        break;

    default:
        echo "Operacion invalida." . PHP_EOL;
        break;
}

?>
#Crear un programa determinar las estaciones del año por numeros - para informe
<?php
// Solicitar primer número
echo "Ingrese el primer numero: ";
$numero1 = trim(fgets(STDIN));

switch ($numero1) {
    case 1:
    case 2:
    case 12:
        echo "La estacion del año es Primavera\n";
        break;
    case 3:
    case 4:
    case 5: 
        echo "La estacionn del año es Verano\n";
        break;
    case 6:
    case 7:
    case 8:
        echo "La estacion del año es Otoño\n";
        break;
    case 9:
    case 10:
    case 11:
        echo "La estacion del año es Invierno|\n";
        break;
        default:
        echo "Numero del mes invalido\n";
}
